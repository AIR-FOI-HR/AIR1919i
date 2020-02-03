import 'package:flutter/material.dart';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/utils/exceptions.dart';
import 'package:mobile_app/utils/meal_response.dart';
import 'package:mobile_app/services/api.dart';
import 'package:mobile_app/models/meal.dart';

class MealProvider with ChangeNotifier {
  bool _initialized = false;

  // AuthProvider
  AuthProvider authProvider;

  // Meals helper list
  List<Meal> _meals = List<Meal>();

  // API Service
  ApiService apiService;

  // Provides access to private variables.
  bool get initialized => _initialized;
  List<Meal> get meals => _meals;

  // AuthProvider is required to instantiate ApiService.
  // This gives the service access to the user token and provider methods.
  MealProvider(AuthProvider authProvider) {
    this.apiService = ApiService(authProvider);
    this.authProvider = authProvider;
    init();
  }

  void init() async {
    try {
      MealResponse mealsResponse = await apiService.getMeals();

      _initialized = true;
      _meals = mealsResponse.meals;

      notifyListeners();
    }
    on AuthException {
      // API returned a AuthException, so user is logged out.
      await authProvider.logOut(true);
    }
    catch (Exception) {
      print(Exception);
    }
  }
}