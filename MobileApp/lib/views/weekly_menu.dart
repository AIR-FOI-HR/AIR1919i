import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:intl/intl.dart';

class WeeklyMenu extends StatefulWidget {
  @override
  WeeklyMenuState createState() => WeeklyMenuState();
}

class WeeklyMenuState extends State<WeeklyMenu>{
  int _selectedIndexForTabBar = 0;

  void _onItemTappedForTabBar(int index) {
    setState(() {
      _selectedIndexForTabBar  = index + 1;
      _selectedIndexForTabBar > 6 ? _selectedIndexForTabBar = 0 : _selectedIndexForTabBar = index + 1;
    });
  }

  String getDay(int index) {
    switch(index) {
      case 0: {  return "Sunday"; }
      break;
      case 1: {  return "Monday"; }
      break;
      case 2: {  return "Tuesday"; }
      break;
      case 3: {  return "Wednesday"; }
      break;
      case 4: {  return "Thursday"; }
      break;
      case 5: {  return "Friday"; }
      break;
      case 6: {  return "Saturday"; }
      break;
      default: { return "Monday"; }
      break;
    }
  }

  @override
  Widget build(BuildContext context) {

    final tabBar = new TabBar(labelColor: Colors.white,labelStyle: TextStyle(fontSize: 16),
      isScrollable: true,
      onTap: _onItemTappedForTabBar,
      unselectedLabelColor: Colors.grey,
      indicatorColor: Color(0xffFFB200),
      tabs: <Widget>[
        new Tab(
          text: " MON ",
        ),
        new Tab(
          text: " TUE ",
        ),
        new Tab(
          text: " WED ",
        ),
        new Tab(
          text: " THU ",
        ),
        new Tab(
          text: " FRI ",
        ),
        new Tab(
          text: " SAT ",
        ),
        new Tab(
          text: " SUN ",
        ),
      ],
    );

    // Testing data
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

    // Get current day and date
    DateTime now = new DateTime.now();
    String formattedDate = DateFormat('MM.dd.yyyy').format(now);

    return new DefaultTabController(
        length: 7,
        child: new Scaffold(
            appBar: new AppBar(
              title: new Text('Weekly Menu'),
              backgroundColor: Colors.black87,
              actions: <Widget>[
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Image.asset("assets/images/Logo.png",
                    height: 45,
                    width: 55,),
                )],
              bottom: tabBar),
          body: SingleChildScrollView(
              child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
                crossAxisAlignment: CrossAxisAlignment.stretch,
                children: <Widget>[
                  Padding(
                    padding: const EdgeInsets.fromLTRB(32, 16, 10, 0),
                    child: Text(getDay(_selectedIndexForTabBar), style: new TextStyle(fontSize: 23.0, fontWeight: FontWeight.bold)),
                  ),
                  Padding(
                    padding: const EdgeInsets.fromLTRB(32, 3, 10, 16),
                    child: Text("$formattedDate", style: new TextStyle(
                        fontSize: 18.0, fontWeight: FontWeight.normal)),
                  ),
                  Padding(
                      padding: EdgeInsets.fromLTRB(10.0,0,10.0,0),
                      child: mealList(context, meals))
                ],
        ),
    ),
          drawer: NavigationDrawer(),
        ),
    );
  }
}