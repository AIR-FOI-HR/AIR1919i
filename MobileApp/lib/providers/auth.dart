import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:mobile_app/widgets/notification_text.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:mobile_app/globals/globals.dart' as globals;

enum Status { Uninitialized, Authenticated, Authenticating, Unauthenticated }

class AuthProvider with ChangeNotifier {

  // Set User status to Uninitialized
  Status _status = Status.Uninitialized;
  String _token;
  NotificationText _notification;

  Status get status => _status;
  String get token => _token;
  NotificationText get notification => _notification;

  // Define Auth API URL
  final String api = '${globals.backendUrl}/api/auth';

  // Initialize User status
  initAuthProvider() async {
    String token = await getToken();
    if (token != null) {
      _token = token;
      _status = Status.Authenticated;
    }
    else _status = Status.Unauthenticated;
    notifyListeners();
  }

  // Login handler
  Future<bool> login(String email, String password, String firebaseToken) async {
    // Update User status to AUthenticating
    _status = Status.Authenticating;
    _notification = null;
    notifyListeners();

    // Define the route
    final url = "$api/login";

    // Map the body of the request
    Map<String, String> body = {
      'email': email,
      'password': password,
      'firebase_token': firebaseToken,
    };

    // Send the request
    final response = await http.post(url, body: body );

    // Check for success and store User data to local storage
    if (response.statusCode == 200) {
      Map<String, dynamic> apiResponse = json.decode(response.body);
      _status = Status.Authenticated;
      _token = apiResponse['access_token'];
      await storeUserData(apiResponse);
      notifyListeners();
      return true;
    }

    // If the credentials were invalid
    if (response.statusCode == 401) {
      _status = Status.Unauthenticated;
      _notification = NotificationText('Invalid email or password.');
      notifyListeners();
      return false;
    }

    // Handle server error
    _status = Status.Unauthenticated;
    _notification = NotificationText('Server error.');
    notifyListeners();
    return false;
  }

  // Registration handler
  Future<Map> register(String name, String email, String password, String passwordConfirm) async {
    // Define URL
    final url = "$api/register";

    // Map the body fo the request
    Map<String, String> body = {
      'name': name,
      'email': email,
      'password': password,
      'password_confirmation': passwordConfirm,
    };

    // Define the response
    Map<String, dynamic> result = {
      "success": false,
      "message": 'Unknown error.'
    };

    // Get teh response
    final response = await http.post( url, body: body );

    // Check for success
    if (response.statusCode == 200) {
      _notification = NotificationText('Registration successful, please log in.', type: 'info');
      notifyListeners();
      result['success'] = true;
      return result;
    }

    // Check if any errors appeared
    Map apiResponse = json.decode(response.body);
    if (response.statusCode == 422) {
      if (apiResponse['errors'].containsKey('email')) {
        result['message'] = apiResponse['errors']['email'][0];
        return result;
      }
      if (apiResponse['errors'].containsKey('password')) {
        result['message'] = apiResponse['errors']['password'][0];
        return result;
      }
      return result;
    }
    return result;
  }

  // Reset the password route
  Future<bool> passwordReset(String email) async {
    final url = "$api/forgot-password";
    Map<String, String> body = {
      'email': email,
    };
    final response = await http.post( url, body: body, );
    if (response.statusCode == 200) {
      _notification = NotificationText('Reset sent. Please check your inbox.', type: 'info');
      notifyListeners();
      return true;
    }
    return false;
  }

  // Store User token, name and img to local storage
  storeUserData(apiResponse) async {
    SharedPreferences storage = await SharedPreferences.getInstance();
    await storage.setString('token', apiResponse['access_token']);
    await storage.setString('name', apiResponse['user']['name']);
    await storage.setString('img', apiResponse['user']['img']);
  }

  // Retrieve User token used for API calls
  Future<String> getToken() async {
    SharedPreferences storage = await SharedPreferences.getInstance();
    String token = storage.getString('token');
    return token;
  }

  // Logout the User and clear the local storage
  logOut([bool tokenExpired = false]) async {
    _status = Status.Unauthenticated;
    if (tokenExpired == true) _notification = NotificationText('Session expired. Please log in again.', type: 'info');
    notifyListeners();

    SharedPreferences storage = await SharedPreferences.getInstance();
    await storage.clear();
  }

}