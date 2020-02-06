import 'package:flutter/material.dart';

// Class which handles the route change animation (left to right or right to left)
class SlideRoute extends PageRouteBuilder {
  final Widget page;
  final from;
  SlideRoute({this.page, this.from})
      : super(
    pageBuilder: (
        BuildContext context,
        Animation<double> animation,
        Animation<double> secondaryAnimation,
        ) =>
    page,
    transitionsBuilder: (
        BuildContext context,
        Animation<double> animation,
        Animation<double> secondaryAnimation,
        Widget child,
        ) =>
        SlideTransition(
          position: Tween<Offset>(
            begin: Offset(from, 0),
            end: Offset.zero,
          ).animate(animation),
          child: child,
    ),
  );
}