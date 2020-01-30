import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';

Widget mealList(BuildContext context, List<Meal> meals) {

  return ListView.separated(
    itemCount: meals.length,
    itemBuilder: (BuildContext context, int index) {
      final meal = meals[index];
      return ListTile(
        key: Key((meal.id).toString()),
        title: Text(meal.name),
      );
    },
    separatorBuilder: (context, index) => Divider(
      color: Colors.black38,
    ),
  );
}
