import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/views/review_meal.dart';
import 'package:mobile_app/views/daily_menu.dart';

Widget mealList(BuildContext context, List<Meal> meals) {
  return
    meals.length < 1 ?
    Padding(
        padding: const EdgeInsets.fromLTRB(23, 0, 15, 0),
        child: Row(
          children: [
            Column(
              children: [
                Row(
                  children: [Text("It looks like there are no meals on the menu today.", style: TextStyle(fontWeight: FontWeight.bold))]
                ),
                Padding(
                  padding: const EdgeInsets.only(top: 15),
                  child: Row(
                       children: [Image.asset("assets/images/SadFace.png", width: 45)]
                  )
                )
              ])
        ]
    )) :
    ListView.builder(
      physics: ClampingScrollPhysics(),
      scrollDirection: Axis.vertical,
      shrinkWrap: true,
      itemCount: meals.length,
      itemBuilder: (BuildContext context, int index) {
        final meal = meals[index];
        return FlatButton(
          child: new Card(
              elevation: 8,
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.end,
                children: <Widget>[
                  Container(
                    width: 70,
                    height: 25,
                    decoration: BoxDecoration(
                      borderRadius: BorderRadius.only(
                          topRight: Radius.circular(12),
                          bottomLeft: Radius.circular(16)
                      ),
                      color: Color(0xffFD0034),
                    ),
                    child: Padding(
                      padding: const EdgeInsets.fromLTRB(15, 2, 2, 2),
                      child: Row(
                        children: <Widget>[
                          Text("120 ", style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)),
                          Icon(
                            Icons.favorite,
                            color: Colors.white,
                            size: 15.0,
                          ),
                        ],
                      ),
                    ),
                  ),
                  Row(
                    children: <Widget>[
                      Expanded(
                        flex: 4,
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: <Widget>[
                            Padding(
                              padding: const EdgeInsets.fromLTRB(12, 0, 0, 5),
                              child: ClipRRect(
                                  borderRadius: BorderRadius.circular(12.0),
                                  child: Image.asset("assets/images/hamburger.jpg",
                                      width: 150)),
                            ),
                            Padding(
                              padding: const EdgeInsets.fromLTRB(12, 0, 0, 0),
                              child: new Row(
                                //mainAxisSize: MainAxisSize.min,
                                children: [
                                  Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                                  Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                                  Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                                  Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                                  Icon(Icons.star_border, color: Color(0xffFFB200),size: 16.0),
                                ],
                              ),
                            ),
                          ],
                        ),
                      ),
                      Expanded(
                        flex: 5,
                        child: Padding(
                          padding: const EdgeInsets.all(10.0),
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.start,
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: <Widget>[
                              Text(meal.name, style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold)),
                              Padding(
                                  padding: const EdgeInsets.fromLTRB(0, 15, 0, 0),
                                  child: Text(meal.description, style: new TextStyle(color: Color(0xff959597), fontSize: 13.0, fontWeight: FontWeight.normal))
                              ),
                              Text(""),Text(""),
                              Text("115 HRK", style: new TextStyle(fontSize: 13.0, fontWeight: FontWeight.bold, color: Colors.black)),
                            ],
                          ),
                        ),
                      ),
                    ],
                  )
                ],
              )
          ),
        onPressed: () {
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => ReviewMeal())
            );
        }
        );
      },
  );
}
