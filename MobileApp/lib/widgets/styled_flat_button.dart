import 'package:flutter/material.dart';
import 'package:mobile_app/styles/styles.dart';

class StyledFlatButton extends StatelessWidget {
  final String text;
  final onPressed;
  final double radius;

  const StyledFlatButton(this.text, {this.onPressed, Key key, this.radius})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return FlatButton(
      color: Colors.orange,
      splashColor: Colors.orange,
      child: Padding(
        padding: EdgeInsets.symmetric(vertical: 18.0),
        child: Text(
          this.text,
          style: Styles.p.copyWith(
            color: Colors.white,
            height: 1,
            fontWeight: FontWeight.w500,
          ),
        ),
      ),
      onPressed: () {
        this.onPressed();
      },
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(radius ?? 4.0),
        side: BorderSide(
          color: Colors.orange,
          width: 2,
        ),
      ),
    );
  }
}