import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';

class ReviewMeal extends StatelessWidget{
  @override

  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
          title: Text('Meal Detail'),
          backgroundColor: Colors.black87,
          actions: <Widget>[
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Image.asset(
                "assets/images/Logo.png",
                height: 45,
                width: 55,
              ),
            )
          ]),
      body: Container(
        child: Stack(
          children: <Widget>[
            Image(
              fit: BoxFit.cover,
              image: AssetImage("assets/images/hamburger.jpg"),
              height: MediaQuery.of(context).size.width * 0.5,
              width: MediaQuery.of(context).size.width,
            ),
            Container(
              height: MediaQuery.of(context).size.width * 0.5,
              width: MediaQuery.of(context).size.width,
              decoration: BoxDecoration(
                gradient: LinearGradient(
                  begin: Alignment.topCenter,
                  end: Alignment.bottomCenter,
                  colors: [
                    const Color(0x00000000),
                    const Color(0x00000000),
                    const Color(0x00000000),
                    const Color(0xCC000000),
                    const Color(0xCC000000),
                  ],
                ),
              ),
            ),
            Positioned(
                bottom: 48.0,
                left: 8.0,
                child: Text("Hamburger",
                    style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 18))),
            Positioned(
                bottom: 29.0,
                left: 8.0,
                child: Text("Sadrazaj",style: TextStyle(color: Colors.white))),
            Positioned(
              bottom: 10.0,
              left: 8.0,
              child: Row(
                  children: [
                    Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                    Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                    Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                    Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                    Icon(Icons.star, color: Colors.grey,size: 16.0),
                  ],
                ),
            ),
            Positioned(
              bottom: 10.0,
              right: 8.0,
              child: Row(
                children: <Widget>[
                  Text("87 ", style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold,fontSize: 13)),
                  Icon(
                    Icons.favorite,
                    color: Colors.red,
                    size: 16.0,
                  ),
                ],
              ),
            ),
          ],
        ),
      )
    );
  }

}
