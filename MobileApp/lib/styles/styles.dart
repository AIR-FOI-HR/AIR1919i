import 'package:flutter/material.dart';

// Class used for common styles used throughout the app
class Styles {
  static TextStyle defaultStyle = TextStyle(
    color: Colors.white
  );

  static TextStyle h1 = defaultStyle.copyWith(
    fontWeight: FontWeight.w700,
    fontSize: 18.0,
    height: 22 / 18,
  );

  static TextStyle p = defaultStyle.copyWith(
    fontSize: 16.0,
  );

  static TextStyle error = defaultStyle.copyWith(
    fontWeight: FontWeight.w500,
    fontSize: 14.0,
    color: Color(0xfffa2020)
  );

  static InputDecoration input = InputDecoration(
    fillColor: Colors.white,
    focusColor: Colors.white,
    focusedBorder: UnderlineInputBorder(
      borderSide: BorderSide(
        color: Colors.orange,
        width: 2.0,
      ),
    ),
    hintStyle: TextStyle(
      color: Colors.white,
    ),
  );

}
