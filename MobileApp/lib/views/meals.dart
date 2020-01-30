import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';

class Meals extends StatefulWidget {
  @override
  MealsState createState() => MealsState();
}

class MealsState extends State<Meals> {

  bool loading = false;

  Widget getStatusMessage(String message) {
    return SnackBar(
      content: Text(message),
      behavior: SnackBarBehavior.floating,
    );
  }

  void loadMore() async {

    // If we're already loading return early.
    if (loading) return;

    setState(() { loading = true; });

    // Loads more items.
    await Provider.of<MealProvider>(context).loadMore('');

    // If auth token has expired, widget is disposed and state is not set.
    if (mounted) setState(() { loading = false; });
  }

  void scanQRCode() { return; }

  @override
  Widget build(BuildContext context) {

    final openMeals = Provider.of<MealProvider>(context).openMeals;

    return Scaffold(
        appBar: AppBar(title: Text('Daily Menu'), backgroundColor: Colors.black87),
        body: Center(
            child: mealList(context, openMeals, loadMore),
        ),
        drawer: NavigationDrawer(),
        floatingActionButton: FloatingActionButton(
            backgroundColor: Colors.orange,
            onPressed: () {
              scanQRCode();
            },
          child: Image.asset('assets/images/QRCodeScan.png', width: 35, height: 35),
        ),
    );
  }
}
