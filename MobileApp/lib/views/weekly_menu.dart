import 'package:flutter/material.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';

class WeeklyMenu extends StatefulWidget {
  @override
  WeeklyMenuState createState() => WeeklyMenuState();
}

class WeeklyMenuState extends State<WeeklyMenu> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Weekly Menu'), backgroundColor: Colors.black87),
      body: Container(
        child: Center(
          child: Padding(
            padding: const EdgeInsets.fromLTRB(30.0, 0.0, 30.0, 0.0),
            child: Text('Weekly Menu'),
          ),
        ),
      ),
      drawer: NavigationDrawer(),
    );
  }
}