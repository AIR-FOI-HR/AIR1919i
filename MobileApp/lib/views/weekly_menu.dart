import 'dart:convert';
import 'dart:io';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:intl/intl.dart';
import 'package:shared_preferences/shared_preferences.dart';

class WeeklyMenu extends StatefulWidget {
  @override
  WeeklyMenuState createState() => WeeklyMenuState();
}

class WeeklyMenuState extends State<WeeklyMenu>{

  int _selectedIndexForTabBar = 1;
  bool initialized = false;

  Future<String> _getUserToken() async{
    final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
    return sharedPrefs.getString('token');
  }

  Future <List<Meal>> getTodaysMeals(index, token) async {
    initialized = true;
    final url = "http://192.168.0.34:8000/api/meals?day=$index";
    final response = await http.get(
      url,
      headers: {
        HttpHeaders.authorizationHeader: 'Bearer $token'
      },
    );
    if (response.statusCode != 200) return [];
    Map<String, dynamic> apiResponse = json.decode(response.body);
    List<dynamic> data = apiResponse['data'];
    List<Meal> meals = mealFromJson(json.encode(data));
    return meals;
  }

  @override
  Widget build(BuildContext context) {

    DateTime now = new DateTime.now();
    String formattedDay =  DateFormat('EEEE').format(now);

    // Get current day and date
    String returnFormattedDate({days = 0}) {
      DateTime now = new DateTime.now().add(new Duration(days: days));
      String formattedDate = DateFormat('dd.MM.yyyy.').format(now);
      return formattedDate;
    }

    final tabBar = new TabBar(
      labelColor: Colors.white,
      labelStyle: TextStyle(fontSize: 16),
      isScrollable: true,
      onTap: (index) {
        setState(() {
          _selectedIndexForTabBar++;
          _selectedIndexForTabBar = index + 1;
        });
        getTodaysMeals(_selectedIndexForTabBar, _getUserToken());
        returnFormattedDate();
      },
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

    return new DefaultTabController(
        initialIndex: new DateTime.now().weekday - 1,
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
                    padding: const EdgeInsets.fromLTRB(32, 25, 10, 0),
                    child: Text( _selectedIndexForTabBar == 1 && initialized ? "Monday" : _selectedIndexForTabBar == 2 ? "Tuesday" : _selectedIndexForTabBar == 3 ? "Wednesday" : _selectedIndexForTabBar == 4 ? "Thursday" : _selectedIndexForTabBar == 5 ? "Friday" : _selectedIndexForTabBar == 6 ? "Saturday" : _selectedIndexForTabBar == 7 ? "Sunday" : formattedDay, style: new TextStyle(fontSize: 23.0, fontWeight: FontWeight.bold)),
                  ),
                  Padding(
                    padding: const EdgeInsets.fromLTRB(32, 3, 10, 16),
                    child: Text("${returnFormattedDate(days: _selectedIndexForTabBar - 1)}", style: new TextStyle(fontSize: 18.0, fontWeight: FontWeight.normal)),
                  ),
                  Padding(
                      padding: EdgeInsets.fromLTRB(10.0,0,10.0,0),
                      child: FutureBuilder(
                          future: _getUserToken(),
                          builder: (BuildContext context, AsyncSnapshot snapshot) {
                            if (snapshot.hasData) {
                              return FutureBuilder(
                                  future: getTodaysMeals((initialized ? _selectedIndexForTabBar : new DateTime.now().weekday), snapshot.data),
                                  builder: (BuildContext context, AsyncSnapshot snapshot) {
                                    return snapshot.hasData ? mealList(context, snapshot.data) : CircularProgressIndicator();
                                  }
                              );
                            } else return CircularProgressIndicator();
                          }
                      ),
                  )
                ],
        ),
    ),
          drawer: NavigationDrawer(),
        ),
    );
  }
}