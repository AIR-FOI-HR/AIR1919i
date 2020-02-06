import 'package:flutter/material.dart';
import 'package:mobile_app/views/my_profile.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/providers/meal.dart';
import 'package:mobile_app/views/loading.dart';
import 'package:mobile_app/views/login.dart';
import 'package:mobile_app/views/register.dart';
import 'package:mobile_app/views/password_reset.dart';
import 'package:mobile_app/views/weekly_menu.dart';
import 'package:mobile_app/views/daily_menu.dart';

void main() {
  runApp(
    ChangeNotifierProvider(
      create: (context) => AuthProvider(),
      child: MaterialApp(
        initialRoute: '/',
        routes: {
          '/': (context) => Router(),
          '/login': (context) => LogIn(),
          '/register': (context) => Register(),
          '/password-reset': (context) => PasswordReset(),
          '/weekly-menu': (context) => WeeklyMenu(),
          '/my-profile': (context) => MyProfile(),
        },
      ),
    ),
  );
}

class Router extends StatelessWidget {
  @override
  Widget build(BuildContext context) {

    // Get the Auth Provider object
    final authProvider = Provider.of<AuthProvider>(context);

    // Check the User current status
    return Consumer<AuthProvider>(
      builder: (context, user, child) {
        switch (user.status) {
          case Status.Uninitialized:
            return Loading();
          case Status.Unauthenticated:
            return LogIn();
          case Status.Authenticated:
            return ChangeNotifierProvider(
              create: (context) => MealProvider(authProvider),
              child: DailyMenu(),
            );
          default:
            return LogIn();
        }
      },
    );
  }
}