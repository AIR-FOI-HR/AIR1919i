import 'package:mobile_app/models/meal.dart';

class MealResponse {
  final List<Meal> meals;
  final String apiMore;
  MealResponse(this.meals, this.apiMore);
}