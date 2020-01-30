import 'package:flutter/material.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';

class MyProfile extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('My Profile'), backgroundColor: Colors.black87),
      body: Container(
        child: Center(
          child: Padding(
            padding: const EdgeInsets.fromLTRB(30.0, 0.0, 30.0, 0.0),
            child: Text('My Profile'),
          ),
        ),
      ),
      drawer: NavigationDrawer(),
    );
  }
}