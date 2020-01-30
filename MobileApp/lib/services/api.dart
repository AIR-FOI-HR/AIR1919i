import 'package:http/http.dart' as http;
import 'dart:async';
import 'dart:io';
import 'dart:convert';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/utils/exceptions.dart';
import 'package:mobile_app/utils/meal_response.dart';
import 'package:mobile_app/models/meal.dart';

class ApiService {

  AuthProvider authProvider;
  String token;

  // The AuthProvider is passed in when this class instantiated.
  // This provides access to the user token required for API calls.
  // It also allows us to log out a user when their token expires.
  ApiService(AuthProvider authProvider) {
    this.authProvider = authProvider;
    this.token = authProvider.token;
  }

  final String api = 'http://192.168.0.34:8000/api/v1/meals';

  /*
  * Validates the response code from an API call.
  * A 401 indicates that the token has expired.
  * A 200 or 201 indicates the API call was successful.
  */
  void validateResponseStatus(int status, int validStatus) {
    if (status == 401) throw new AuthException( "401", "Unauthorized" );
    if (status != validStatus) throw new ApiException( status.toString(), "API Error" );
  }

  // Returns a list of meals.
  Future<MealResponse> getMeals({ String url = '' }) async {
    // Defaults to the first page if no url is set.
    if (url == '') url = "$api";

    final response = await http.get(
      url,
      headers: {
        HttpHeaders.authorizationHeader: 'Bearer $token'
      },
    );

    validateResponseStatus(response.statusCode, 200);

    Map<String, dynamic> apiResponse = json.decode(response.body);
    List<dynamic> data = apiResponse['data'];

    List<Meal> meals = mealFromJson(json.encode(data));

    String next = apiResponse['links']['next'];

    return MealResponse(meals, next);
  }
}