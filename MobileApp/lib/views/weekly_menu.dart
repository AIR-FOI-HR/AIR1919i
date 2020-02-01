import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';

class WeeklyMenu extends StatefulWidget {
  @override
  WeeklyMenuState createState() => WeeklyMenuState();
}

class WeeklyMenuState extends State<WeeklyMenu>{
  int _selectedIndexForTabBar = 0;

  void _onItemTappedForTabBar(int index) {
    setState(() {
      _selectedIndexForTabBar  = index+1;
      _selectedIndexForTabBar > 6 ? _selectedIndexForTabBar == 0 : _selectedIndexForTabBar==index+1;
    });
  }

  @override
  Widget build(BuildContext context) {

    final tabBar = new TabBar(labelColor: Colors.white,labelStyle: TextStyle(fontSize: 16),
      isScrollable: true,
      onTap: _onItemTappedForTabBar,
      unselectedLabelColor: Colors.grey,
      indicatorColor: Colors.yellow,
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
              padding: const EdgeInsets.all(8.0),
              child: Text( _selectedIndexForTabBar==1 ? "Monday" : _selectedIndexForTabBar==2 ? "Tuesday" :
                  _selectedIndexForTabBar==3 ? "Wednesday" : _selectedIndexForTabBar==4 ? "Thursday" :
                  _selectedIndexForTabBar==5 ? "Friday" : _selectedIndexForTabBar==6 ? "Saturday" : "Sunday",
                  style: new TextStyle(fontSize: 23.0,
                      fontWeight: FontWeight.bold)),
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
        ),
    );
  }
}