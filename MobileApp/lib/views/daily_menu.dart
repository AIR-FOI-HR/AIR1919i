import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:qrscan/qrscan.dart' as scanner;

class DailyMenu extends StatefulWidget {
  @override
  DailyMenuState createState() => DailyMenuState();
}

class DailyMenuState extends State<DailyMenu> {

  void scanQRCode() async {
    String cameraScanResult = await scanner.scan();
    print('Printing QR Code Scan Result');
    print(cameraScanResult);
    // TODO => Send (authenticated) API request to backend, validate the request and return the result.
  }

  @override
  Widget build(BuildContext context) {

//    final meals = Provider.of<MealProvider>(context).meals;

    final meal_1 = new Meal();
    meal_1.id = 1;
    meal_1.name = 'Hamburger';
    meal_1.description = 'Very tasty.';

    final meal_2 = new Meal();
    meal_2.id = 1;
    meal_2.name = 'Salat';
    meal_2.description = 'Much expensive.';

    final meal_3 = new Meal();
    meal_3.id = 1;
    meal_3.name = 'Pizza';
    meal_3.description = 'Such delicious.';

    List<Meal> meals = List<Meal>(3);

    meals[0] = meal_1;
    meals[1] = meal_2;
    meals[2] = meal_3;

    return Scaffold(
      appBar: AppBar(
          title: Text('Daily Menu'),
          backgroundColor: Colors.black87,
          actions: <Widget>[
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Image.asset("assets/images/Logo.png",
                height: 45,
              width: 55,),
            )]
      ),
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: <Widget>[
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Text("Dan", style: new TextStyle(
                  fontSize: 23.0, fontWeight: FontWeight.bold)),
            ),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Text("Datum", style: new TextStyle(
                  fontSize: 18.0, fontWeight: FontWeight.normal)),
            ),
            Padding(
              padding: EdgeInsets.fromLTRB(10.0,0,10.0,0),
                child: mealList(context, meals))
          ],
        ),
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