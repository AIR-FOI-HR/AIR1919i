import 'package:flutter/material.dart';

class NotificationText extends StatelessWidget {
  final String text;
  final String type;

  NotificationText(this.text, {this.type, Key key}) : super(key: key);

  @override
  Widget build(BuildContext context) {

    Color color = Colors.red;

    if (type == 'info') color = Colors.orange;

    return Text(
      text,
      textAlign: TextAlign.center,
      style: TextStyle(color: color),
    );
  }
}
