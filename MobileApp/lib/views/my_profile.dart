import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:mobile_app/utils/exceptions.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:percent_indicator/linear_percent_indicator.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;

class MyProfile extends StatelessWidget {

  @override
  Widget build(BuildContext context) {

    GlobalKey<ScaffoldState> scaffoldState = new GlobalKey<ScaffoldState>();

    // Returns my profile data TODO => Send token from storage and authenticate.
    Future <Map<String, dynamic>> getMyProfileData() async {
      final url = "http://192.168.0.34:8000/api/my-profile";
      final response = await http.get(url);
      if (response.statusCode != 200) throw new ApiException(response.statusCode.toString(), "API Error" );
      Map<String, dynamic> apiResponse = json.decode(response.body);
      return apiResponse;
    }

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
      key: scaffoldState,
      body: SingleChildScrollView(
        child: FutureBuilder(
            future: getMyProfileData(),
            initialData: '0',
            builder: (BuildContext context, AsyncSnapshot snapshot) {
              if (snapshot.hasData) {
                return Column(
                  children: <Widget>[
                    Padding(
                      padding: const EdgeInsets.fromLTRB(10, 25, 10, 10),
                      child: Center(
                        child: ClipRRect(
                          borderRadius: BorderRadius.circular(80.0),
                          child: FutureBuilder<String>(
                              future: _getUserImage(),
                              initialData: 'http://192.168.0.43:8000/img/users/DefaultUserImage.png',
                              builder: (BuildContext context, AsyncSnapshot<String> snapshot) {
                                return snapshot.hasData ?
                                Image.network(snapshot.data != 'NO_IMAGE_SET' ? snapshot.data : 'http://192.168.0.43:8000/img/users/DefaultUserImage.png', width: 100) :
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
                      padding: const EdgeInsets.fromLTRB(0,15,0,0),
                      child: Row(
                        children: <Widget>[
                          Expanded(
                              flex: 6,
                              child: Row(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: <Widget>[
                                  Icon(Icons.favorite),
                                  Text(" ${snapshot.data['number_of_favorite_meals']}", style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18))
                                ],
                              )),
                          Expanded(
                              flex: 5,
                              child: Row(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: <Widget>[
                                  Icon(Icons.star),
                                  Text(" ${snapshot.data['number_of_reviews']}",style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18))
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
                          itemCount: snapshot.data['favorite_meals'].length,
                          itemBuilder: (context, index) {
                            final meal = snapshot.data['favorite_meals'][index];
                            return Container(
                              width: MediaQuery.of(context).size.width * 0.4,
                              child: Card(
                                elevation: 2,
                                child: Container(
                                    child: Stack(
                                      children: <Widget>[
                                        Positioned(
                                          top: 20,
                                          left: 18,
                                          child: ClipRRect(
                                              borderRadius: BorderRadius.circular(6.0),
                                              child: Image.network("http://192.168.0.34:8000/${meal['img']}", width: 120)),
                                        ),
                                        Positioned(
                                          right: 10,
                                          top: 77,
                                          child: Container(
                                            width: 27,
                                            height: 27,
                                            decoration: BoxDecoration(
                                              borderRadius: BorderRadius.circular(100),
                                              color: Color(0xffFD0034),
                                            ),
                                          ),
                                        ),
                                        Positioned(
                                          top: 67,
                                          left: 109,
                                          child: IconButton(
                                            icon: Icon(Icons.favorite, size: 15),
                                            color: Colors.white,
                                            onPressed: () {
                                              final snackBar = SnackBar(
                                                  elevation: 6.0,
                                                  behavior: SnackBarBehavior.floating,
                                                  backgroundColor: Colors.green,
                                                  content:
                                                  Text("Hamburger removed from favorites."));
                                              scaffoldState.currentState.showSnackBar(snackBar);
                                            },
                                          ),
                                        ),
                                        Positioned(
                                          top: 101,
                                          left: 20,
                                          child: Text("${meal['name']}", style: TextStyle(fontSize: 15.0, fontWeight: FontWeight.bold)),
                                        ),
                                        Positioned(
                                          bottom: 3,
                                          left: 17,
                                          child: Row(
                                            mainAxisAlignment: MainAxisAlignment.center,
                                            children: [
                                              Icon(Icons.star, color: Color(0xffFFB200),size: 15.0),
                                              Icon(Icons.star, color: Color(0xffFFB200),size: 15.0),
                                              Icon(Icons.star, color: Color(0xffFFB200),size: 15.0),
                                              Icon(Icons.star, color: Color(0xffFFB200),size: 15.0),
                                              Icon(Icons.star, color: Colors.grey,size: 15.0),
                                            ],
                                          ),
                                        ),
                                      ],
                                    )
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
                      padding: const EdgeInsets.all(10.0),
                      child: Text("On the receipt there's a QR code which you are able to scan. "
                          "For every QR code scanned you profress by 10%. After 10 meals your "
                          "next meal is free of charge! You have ${snapshot.data['signatures_count']} signatures."),
                    ),
                    Padding(
                      padding: EdgeInsets.all(15.0),
                      child: new LinearPercentIndicator(
                        width: 380.0,
                        lineHeight: 30.0,
                        percent: snapshot.data['signatures_count']/10,
                        center: Text(snapshot.data['signatures_count'] == "0%" ? 0 : "${snapshot.data['signatures_count'] * 10}%", style: new TextStyle(fontSize: 16.0, fontWeight: FontWeight.bold, color: Colors.white)),
                        linearStrokeCap: LinearStrokeCap.roundAll,
                        backgroundColor: Colors.orange.shade200,
                        progressColor: Colors.orange,
                      ),
                    ),
                  ],
                );
              } else return CircularProgressIndicator();
            }
        ),
      ),
      drawer: NavigationDrawer(),
    );
  }
}
