import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/views/review_meal.dart';

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
    Padding(
      padding: EdgeInsets.only(bottom: 30),
      child: ListView.builder(
        physics: ClampingScrollPhysics(),
        scrollDirection: Axis.vertical,
        shrinkWrap: true,
        itemCount: meals.length,
        itemBuilder: (BuildContext context, int index) {
          final meal = meals[index];
          List<Widget> icons = [];
          var i = 0;
          for (i; i < meal.stars; i++) icons.add(Icon(Icons.star, color: Color(0xffFFB200),size: 15.0));
          for (i; i < 5; i++) icons.add(Icon(Icons.star, color: Colors.grey,size: 15.0));
          return FlatButton(
            child: Padding(
              padding: EdgeInsets.fromLTRB(0, 5, 0, 5),
              child: Card(
                  elevation: 2,
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
                            padding: const EdgeInsets.fromLTRB(25, 2, 2, 2),
                            child: Row(
                              children: <Widget>[
                                Text("${meal.userFavorites} ", style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)),
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
                                        child: Image.network("http://192.168.0.34:8000/${meal.img}", width: 150)),
                                  ),
                                  Padding(
                                    padding: const EdgeInsets.fromLTRB(12, 0, 0, 0),
                                    child: new Row(
                                      children: [
                                        for (var item in icons) item
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
                                    Text("${meal.price} HRK", style: new TextStyle(fontSize: 13.0, fontWeight: FontWeight.bold, color: Colors.black)),
                                  ],
                                ),
                              ),
                            ),
                          ],
                        )
                      ],
                ),
              ),
            ),
          onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => ReviewMeal())
              );
          }
          );
        }
    )
  );
}
