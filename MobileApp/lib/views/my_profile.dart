import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:percent_indicator/linear_percent_indicator.dart';
import 'package:shared_preferences/shared_preferences.dart';

class MyProfile extends StatelessWidget {

  @override
  Widget build(BuildContext context) {

    int signatureNumber = 7;

    final meal_1 = new Meal();
    meal_1.id = 1;
    meal_1.name = 'Hamburger';
    meal_1.description = 'Very tasty.';

    final meal_2 = new Meal();
    meal_2.id = 1;
    meal_2.name = 'Salat';
    meal_2.description = 'Much expensive.';

    final meal_3 = new Meal();
    meal_3.id = 1;
    meal_3.name = 'Pizza';
    meal_3.description = 'Such delicious.';

    List<Meal> meals = List<Meal>(3);

    meals[0] = meal_1;
    meals[1] = meal_2;
    meals[2] = meal_3;

    Future<String> _getUserImage() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('img');
    }

    Future<String> _getUserName() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('name');
    }

    return Scaffold(
      appBar: AppBar(
          title: Text('My Profile'),
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
      body: SingleChildScrollView(
        child: Column(
          children: <Widget>[
            Padding(
              padding: const EdgeInsets.fromLTRB(10, 25, 10, 10),
              child: Center(
                child: ClipRRect(
                    borderRadius: BorderRadius.circular(80.0),
                    child: FutureBuilder<String>(
                        future: _getUserImage(),
                        initialData: 'http://192.168.0.43:8000/img/DefaultUserImage.png',
                        builder: (BuildContext context, AsyncSnapshot<String> snapshot) {
                          return snapshot.hasData ?
                          Image.network(snapshot.data != 'NO_IMAGE_SET' ? snapshot.data : 'http://192.168.0.43:8000/img/DefaultUserImage.png', width: 100) :
                          CircularProgressIndicator();
                        }
                    ),
                ),
              ),
            ),
            FutureBuilder<String>(
                future: _getUserName(),
                initialData: 'Name',
                builder: (BuildContext context, AsyncSnapshot<String> snapshot) {
                  return snapshot.hasData ?
                  Text(snapshot.data, style: TextStyle(fontWeight: FontWeight.bold)) :
                  CircularProgressIndicator();
                }
            ),
            Padding(
              padding: const EdgeInsets.all(6.0),
              child: Row(
                children: <Widget>[
                  Expanded(
                      flex: 6,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Icon(Icons.favorite),
                          Text(" 10",style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18),)
                        ],
                      )),
                  Expanded(
                      flex: 5,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Icon(Icons.star),
                          Text(" 5",style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18))
                        ],
                      )),
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.fromLTRB(0, 0, 0, 25),
              child: Row(
                children: <Widget>[
                  Expanded(
                      flex: 6,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Text("Favorite Meals",style: TextStyle(color: Colors.grey, fontSize: 14),)
                        ],
                      )),
                  Expanded(
                      flex: 5,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Text("Reviews Left",style: TextStyle(color: Colors.grey, fontSize: 14),)
                        ],
                      )),
                ],
              ),
            ),
            Text("Favorite Meals", style: TextStyle(
                fontSize: 25,
                fontWeight: FontWeight.bold
            ),),
            Container(
              padding: EdgeInsets.symmetric(horizontal: 16.0, vertical: 24.0),
              height: MediaQuery.of(context).size.height * 0.28,
              child: ListView.builder(
                  scrollDirection: Axis.horizontal,
                  itemCount: 8,
                  itemBuilder: (context, index) {
                    return Container(
                      width: MediaQuery.of(context).size.width * 0.4,
                      child: Card(
                        elevation: 8,
                        child: Container(
                          child: Column(
                            children: <Widget>[
                              Padding(
                                padding: const EdgeInsets.fromLTRB(130, 0, 0, 0),
                                child: Container(
                                  width: 30,
                                  height: 30,
                                  decoration: BoxDecoration(
                                    borderRadius: BorderRadius.circular(70),
                                    color: Color(0xffFD0034),
                                  ),
                                  child: Padding(
                                    padding: const EdgeInsets.fromLTRB(5.5, 0, 0, 0),
                                    child: Row(
                                      children: <Widget>[
                                        Icon(
                                          Icons.favorite,
                                          color: Colors.white,
                                          size: 15.0,
                                        ),
                                      ],
                                    ),
                                  ),
                                ),
                              ),
                              Padding(
                                padding: const EdgeInsets.fromLTRB(0, 0, 0, 10),
                                child: ClipRRect(
                                    borderRadius: BorderRadius.circular(6.0),
                                    child: Image.asset("assets/images/hamburger.jpg",
                                        width: 120)),
                              ),
                              Padding(
                                padding: const EdgeInsets.fromLTRB(0, 0, 0, 10),
                                child: Text("Name",
                                    style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold)),
                              ),
                              Padding(
                                padding: const EdgeInsets.fromLTRB(0, 0, 0, 10),
                                child: Text("Name", style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold)),
                              ),
                            ],
                          ),
                        ),
                      ),
                    );
                  }),
            ),
            Text("Free Meal", style: TextStyle(
                fontSize: 25,
                fontWeight: FontWeight.bold
            ),),
            Padding(
              padding: const EdgeInsets.all(13.0),
              child: Text("On the receipt there's a QR code which you are able to scan. "
                  "For every QR code scanned you profress by 10%. After 10 meals your "
                  "next meal is free of charge! You have 7 signatures."),
            ),
            Padding(
              padding: EdgeInsets.all(15.0),
              child: new LinearPercentIndicator(
                width: 380.0,
                lineHeight: 30.0,
                percent: signatureNumber/10,
                center: Text(
                  "70.0%",
                  style: new TextStyle(fontSize: 16.0, fontWeight: FontWeight.bold, color: Colors.white),
                ),
                linearStrokeCap: LinearStrokeCap.roundAll,
                backgroundColor: Colors.orange.shade200,
                progressColor: Colors.orange,
              ),
            ),
          ],
        ),
      ),
      drawer: NavigationDrawer(),
    );
  }
}
