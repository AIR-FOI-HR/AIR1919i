import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';

Widget mealList(BuildContext context, List<Meal> meals) {
  return ListView.separated(
    scrollDirection: Axis.vertical,
    shrinkWrap: true,
    itemCount: meals.length,
    itemBuilder: (BuildContext context, int index) {
      final meal = meals[index];
      return Padding(
        padding: const EdgeInsets.fromLTRB(15, 0, 15, 0),
        child: new Card(
          elevation: 8,
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.end,
            children: <Widget>[
              Container(
                  width: 60,
                  height: 25,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.only(
                    topRight: Radius.circular(7.0),
                    bottomLeft: Radius.circular(7.0)
                  ),
                  color: Colors.red,
                ),
                child: Padding(
                  padding: const EdgeInsets.fromLTRB(6, 2, 2, 2),
                  child: Row(
                    children: <Widget>[
                      Text("120 ", style: TextStyle(color: Colors.white)),
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
                              borderRadius: BorderRadius.circular(6.0),
                              child: Image.asset("assets/images/hamburger.jpg",
                                  width: 150)),
                        ),
                        Padding(
                          padding: const EdgeInsets.fromLTRB(12, 5, 0, 10),
                          child: new Row(
                            //mainAxisSize: MainAxisSize.min,
                            children: [
                              Icon(Icons.star, color: Colors.yellow[500],size: 16.0),
                              Icon(Icons.star, color: Colors.yellow[500],size: 16.0),
                              Icon(Icons.star, color: Colors.yellow[500],size: 16.0),
                              Icon(Icons.star, color: Colors.yellow[500],size: 16.0),
                              Icon(Icons.star, color: Colors.grey,size: 16.0),
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
                          Text(meal.name,
                              style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold)),
                          Text(meal.description, style: new TextStyle(fontSize: 13.0, fontWeight: FontWeight.normal)),
                          Text(""),Text(""),Text(""),
                          Padding(
                            padding: const EdgeInsets.fromLTRB(0.2, 10.0, 0.0, 0.0),
                            child: new Text("115 HRK",
                                style: new TextStyle(
                                    fontSize: 13.0, fontWeight: FontWeight.bold, color: Colors.black)),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              )
            ],
          )
        ),
      );
    },
    separatorBuilder: (context, index) => Divider(
      color: Colors.grey,
    ),
  );
}
