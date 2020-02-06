import 'package:http/http.dart' as http;
import 'dart:async';
import 'dart:io';
import 'dart:convert';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/utils/exceptions.dart';
import 'package:mobile_app/utils/meal_response.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/globals/globals.dart' as globals;

class ApiService {

  AuthProvider authProvider;
  String token;

  // The AuthProvider is passed which provides access to User token required for API calls and for the logout handling
  ApiService(AuthProvider authProvider) {
    this.authProvider = authProvider;
    this.token = authProvider.token;
  }

  // Define the common route
  final String api = '${globals.backendUrl}/api';

  // Validates the response code from an API call, 401 is token expired and 200 or 201 is successful
  void validateResponseStatus(int status, int validStatus) {
    if (status == 401) throw new AuthException( "401", "Unauthorized" );
    if (status != validStatus) throw new ApiException(status.toString(), "API Error");
  }

  // Returns list of meals depending on the today's day
  Future<MealResponse> getMeals() async {
    final url = "$api/meals?day=${new DateTime.now().weekday}";
    final response = await http.get(
      url,
      headers: {
        HttpHeaders.authorizationHeader: 'Bearer $token'
      }
    );

    // Validate the response for success
    validateResponseStatus(response.statusCode, 200);

    // If the request was successful, map the Meals to a List and return the response
    Map<String, dynamic> apiResponse = json.decode(response.body);
    List<dynamic> data = apiResponse['data'];
    List<Meal> meals = mealFromJson(json.encode(data));
    return MealResponse(meals);
  }
}