import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';

class DailyMenu extends StatefulWidget {
  @override
  DailyMenuState createState() => DailyMenuState();
}

class DailyMenuState extends State<DailyMenu> {

  void scanQRCode() { return; }

  @override
  Widget build(BuildContext context) {

    final meals = Provider.of<MealProvider>(context).meals;

    return Scaffold(
      appBar: AppBar(title: Text('Daily Menu'), backgroundColor: Colors.black87),
      body: Center(
        child: mealList(context, meals),
      ),
      drawer: NavigationDrawer(),
      floatingActionButton: FloatingActionButton(
        backgroundColor: Colors.orange,
        onPressed: () {
          scanQRCode(); // TODO => Add functionality
        },
        child: Image.asset('assets/images/QRCodeScan.png', width: 35, height: 35),
      ),
    );
  }
}
