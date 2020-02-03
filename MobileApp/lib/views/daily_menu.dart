import 'dart:math';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:qrscan/qrscan.dart' as scanner;
import 'package:intl/intl.dart';

class DailyMenu extends StatefulWidget {
  @override
  DailyMenuState createState() => DailyMenuState();
}

class DailyMenuState extends State<DailyMenu> {
  final reviewPin = new TextEditingController();
  final _formKey = GlobalKey<FormState>();

  void submitDataPin(){
    if(reviewPin.text.isEmpty){
      return;
    }
    else {
      final reviewTxt = reviewPin.text;
      reviewPin.text = "";
    }
  }

  void scanQRCode() async {
    Navigator.of(context).pop();
    String cameraScanResult = await scanner.scan();
    print('Printing QR Code Scan Result');
    print(cameraScanResult);
    // TODO => Send (authenticated) API request to backend, validate the request and return the result.
  }

  void _showDialogPin(){
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: new Text("Your PIN"),
          content: Form(
              key: _formKey,
              child: TextFormField(
                  keyboardType: TextInputType.text,
                  controller: reviewPin,
                  maxLength: 8,

                  decoration: new InputDecoration(
                    hintText: "Enter the PIN given on your invoice",
                    focusedBorder: UnderlineInputBorder(
                      borderSide: BorderSide(color: Color(0xffFFB200)),
                    ),
                  ),
                  validator: (value) {
                    if(value.isEmpty) {
                      return "Please enter the PIN";
                    }
                    if(value.length !=8) {
                      return "PIN must be at least 8 characters in length";
                    }
                    return null;
                  }
              )
          ),
            actions: <Widget>[
              new FlatButton(
                color: Color(0xffFFB200),
                child: new Text("Post",style: TextStyle(color: Colors.white),),
                onPressed: () {
                  if (_formKey.currentState.validate()) {
                    submitDataPin();
                    Navigator.of(context).pop();
                  }
                },
              ),
              new FlatButton(
                color: Color(0xffFFB200),
                child: new Text("Close",style: TextStyle(color: Colors.white),),
                onPressed: () {
                  Navigator.of(context).pop();
                },
              ),
            ]
        );
      }
    );
  }

  void _showDialog() {
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: new Text("Select signature collection type"),
          content: new Text("Signature collection via PIN or by QR code scan"),
          actions: <Widget>[
            new FlatButton(
              color: Color(0xffFFB200),
              child: new Text("PIN", style: TextStyle(color: Colors.white),),
              onPressed: () {
                Navigator.of(context).pop();
                _showDialogPin();
              },
            ),
            new FlatButton(
              color: Color(0xffFFB200),
              child: new Text("QRcode",style: TextStyle(color: Colors.white),),
              onPressed: () {
                scanQRCode();
              },
            ),
          ],
        );
      },
    );
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

    List<Meal> meals = List<Meal>(6);

    meals[0] = meal_1;
    meals[1] = meal_2;
    meals[2] = meal_3;
    meals[3] = meal_1;
    meals[4] = meal_2;
    meals[5] = meal_3;

    // Get current day and date
    DateTime now = new DateTime.now();
    String formattedDay =  DateFormat('EEEE').format(now);
    String formattedDate = DateFormat('MM.dd.yyyy.').format(now);

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
              padding: const EdgeInsets.fromLTRB(32, 25, 10, 0),
              child: Text("$formattedDay", style: new TextStyle(fontSize: 23.0, fontWeight: FontWeight.w900)),
            ),
            Padding(
              padding: const EdgeInsets.fromLTRB(32, 3, 10, 16),
              child: Text("$formattedDate", style: new TextStyle(color: Color(0xff959597), fontSize: 18.0, fontWeight: FontWeight.normal)),
            ),
            Padding(
              padding: EdgeInsets.fromLTRB(10.0,0,10.0,0),
                child: mealList(context, meals))
          ],
        ),
      ),
      drawer: NavigationDrawer(),
      floatingActionButton: FloatingActionButton(
        backgroundColor: Color(0xffFFB200),
        onPressed: () {
          _showDialog();
        },
        child: Image.asset('assets/images/QRCodeScan.png', width: 35, height: 35),
      ),
    );
  }
}