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

  // Stores separate lists for open and closed meals.
  List<Meal> _meals = List<Meal>();

  // The API is paginated. If there are more results we store
  // the API url in order to lazily load them later.
  String _mealsApiMore;

  // API Service
  ApiService apiService;

  // Provides access to private variables.
  bool get initialized => _initialized;
  List<Meal> get openMeals => _meals;
  String get mealsApiMore => _mealsApiMore;

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
      _mealsApiMore = mealsResponse.apiMore;

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

  Future<void> loadMore(String activeTab) async {
    // Set apiMore
    String apiMore = _mealsApiMore;

    // If there's no more items to load, return early.
    if (apiMore == null) return;

    try {
      // Make the API call to get more meals.
      MealResponse mealsResponse = await apiService.getMeals(url: apiMore);

      // Get the current meals
      List<Meal> currentMeals = _meals;

      // Combine current meals with new results from API.
      List<Meal> allMeals = [...currentMeals, ...mealsResponse.meals];

      _meals = allMeals;
      _mealsApiMore = mealsResponse.apiMore;

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