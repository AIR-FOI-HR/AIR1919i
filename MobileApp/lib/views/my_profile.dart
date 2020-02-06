import 'dart:convert';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:mobile_app/utils/exceptions.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:percent_indicator/linear_percent_indicator.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'package:mobile_app/globals/globals.dart' as globals;

class MyProfile extends StatefulWidget {
  @override
  _MyProfileState createState() => _MyProfileState();
}

class _MyProfileState extends State<MyProfile> {

  // If the "heart" floating button was pressed
  bool pressed = false;
  // Initial value of the subscription
  String switchValue = 'no';
  GlobalKey<ScaffoldState> scaffoldState = new GlobalKey<ScaffoldState>();

  @override
  Widget build(BuildContext context) {

    // Retrieves all of the User data necessary for the Widget build
    Future <Map<String, dynamic>> getMyProfileData(token) async {
      final url = "${globals.backendUrl}/api/my-profile";
      final response = await http.get(
        url,
        headers: {
          HttpHeaders.authorizationHeader: 'Bearer $token'
        }
      );
      if (response.statusCode != 200) throw new ApiException(response.statusCode.toString(), "API Error");
      Map<String, dynamic> apiResponse = json.decode(response.body);
      return apiResponse;
    }

    // Retrieves User token from the storage
    Future<String> _getUserToken() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('token');
    }

    // Retrieves User image from the storage
    Future<String> _getUserImage() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('img');
    }

    // Retrieves User name from the storage
    Future<String> _getUserName() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('name');
    }

    // Adds the Meal to User's favorites
    Future<bool> addToFavorites(mealId, token) async {
      final url = "${globals.backendUrl}/api/meals/$mealId?toggle_favorite=1";
      Map<String, String> body = { 'meal_id': mealId.toString() };
      final response = await http.put(
        url,
        headers: {
          HttpHeaders.authorizationHeader: 'Bearer $token'
        },
        body: body
      );
      return response.statusCode == 200 ? true : false;
    }

    // Subscribes the User to notifications
    Future<bool> subscribeToNotifications(value, token) async {
      final url = "${globals.backendUrl}/api/subscribe-to-notifications";
      Map<String, String> body = { 'subscribed': value.toString() };
      final response = await http.post(
          url,
          headers: {
            HttpHeaders.authorizationHeader: 'Bearer $token'
          },
          body: body
      );
      return response.statusCode == 200 ? true : false;
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
            future: _getUserToken(),
            builder: (BuildContext context, AsyncSnapshot snapshot) {
              if (snapshot.hasData) {
                String token = snapshot.data;
                return FutureBuilder(
                    future: getMyProfileData(token),
                    builder: (BuildContext context, AsyncSnapshot snapshot) {
                      if (snapshot.hasData) {
                        switchValue = snapshot.data['subscribed_to_notifications'];
                        return Column(
                          children: <Widget>[
                            Padding(
                              padding: const EdgeInsets.fromLTRB(10, 25, 10, 10),
                              child: Center(
                                child: ClipRRect(
                                  borderRadius: BorderRadius.circular(80.0),
                                  child: FutureBuilder<String>(
                                      future: _getUserImage(),
                                      initialData: '${globals.backendUrl}/img/users/DefaultUserImage.png',
                                      builder: (BuildContext context, AsyncSnapshot<String> snapshot) {
                                        return snapshot.hasData ?
                                        Image.network(snapshot.data != 'NO_IMAGE_SET' ? snapshot.data : '${globals.backendUrl}/img/users/DefaultUserImage.png', width: 100) :
                                        Padding(
                                          padding: const EdgeInsets.only(top: 24),
                                          child: Row(
                                            mainAxisAlignment: MainAxisAlignment.center,
                                            children: <Widget>[
                                              Column(
                                                crossAxisAlignment: CrossAxisAlignment.center,
                                                children: <Widget>[
                                                  SizedBox(width: 50, height: 50, child: CircularProgressIndicator()),
                                                ],
                                              ),
                                            ],
                                          ),
                                        );
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
                                  Padding(
                                    padding: const EdgeInsets.only(top: 24),
                                    child: Row(
                                      mainAxisAlignment: MainAxisAlignment.center,
                                      children: <Widget>[
                                        Column(
                                          crossAxisAlignment: CrossAxisAlignment.center,
                                          children: <Widget>[
                                            SizedBox(width: 50, height: 50, child: CircularProgressIndicator()),
                                          ],
                                        ),
                                      ],
                                    ),
                                  );
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
                                          Text("Favorite Meals",style: TextStyle(fontSize: 14),)
                                        ],
                                      )),
                                  Expanded(
                                      flex: 5,
                                      child: Row(
                                        mainAxisAlignment: MainAxisAlignment.center,
                                        children: <Widget>[
                                          Text("Reviews Left",style: TextStyle(fontSize: 14),)
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
                                height: snapshot.data['favorite_meals'].length > 0 ? 200 : 82,
                                child: snapshot.data['favorite_meals'].length > 0 ? ListView.builder(
                                    scrollDirection: Axis.horizontal,
                                    itemCount: snapshot.data['favorite_meals'].length,
                                    itemBuilder: (context, index) {
                                      final meal = snapshot.data['favorite_meals'][index];
                                      List<Widget> icons = [];
                                      var i = 0;
                                      while (i < meal['stars']) { i++; icons.add(Icon(Icons.star, color: Color(0xffFFB200),size: 15.0)); }
                                      while (i < 5) { i++; icons.add(Icon(Icons.star, color: Colors.grey,size: 15.0)); }
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
                                                        child: Image.network("${globals.backendUrl}/${meal['img']}", width: 120)),
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
                                                    right: 0,
                                                    child: IconButton(
                                                      icon: Icon((meal['is_favorite'] ? Icons.favorite : Icons.favorite_border), size: 15),
                                                      color: Colors.white,
                                                      onPressed: () {
                                                        if (pressed) return;
                                                        pressed = true;
                                                        addToFavorites(meal['id'], token);
                                                        meal['is_favorite'] = meal['is_favorite'] ? false : true;
                                                        final snackBar = SnackBar(
                                                            elevation: 6.0,
                                                            duration:  const Duration(seconds: 2),
                                                            behavior: SnackBarBehavior.fixed,
                                                            backgroundColor: Colors.green,
                                                            action: SnackBarAction(
                                                                label: "Undo",
                                                                textColor: Colors.white,
                                                                onPressed: () => { addToFavorites(meal['id'], token) }
                                                            ),
                                                            content: meal['is_favorite'] ?
                                                            Row(children: <Widget> [
                                                              Icon(
                                                                Icons.favorite,
                                                                color: Colors.white,
                                                                size: 24.0,
                                                              ),
                                                              Text("  ${meal["name"]}", style: TextStyle(fontWeight: FontWeight.bold)),
                                                              Text(" added to favorites."),
                                                            ])
                                                                : Row(children: <Widget> [
                                                              Icon(
                                                                Icons.favorite_border,
                                                                color: Colors.white,
                                                                size: 24.0,
                                                              ),
                                                              Text("  ${meal["name"]}", style: TextStyle(fontWeight: FontWeight.bold)),
                                                              Text(" removed from favorites."),
                                                            ]));
                                                        scaffoldState.currentState.showSnackBar(snackBar).closed.then((SnackBarClosedReason reason) { pressed = false; updateState(); });
                                                      },
                                                    ),
                                                  ),
                                                  Positioned(
                                                    top: 101,
                                                    left: 20,
                                                    child: Text("${meal['name']}", style: TextStyle(fontSize: 15.0, fontWeight: FontWeight.bold)),
                                                  ),
                                                  Positioned(
                                                    top: 120,
                                                    left: 17,
                                                    child: Row(
                                                      mainAxisAlignment: MainAxisAlignment.center,
                                                      children: [
                                                        for (var item in icons) item
                                                      ],
                                                    ),
                                                  ),
                                                ],
                                              )
                                          ),
                                        ),
                                      );
                                    }) : Text("You currently no favorite meals. Check out the daily or the weekly menu and find something you like.")
                            ),
                            Text("Subscribe", style: TextStyle(
                                fontSize: 25,
                                fontWeight: FontWeight.bold
                            ),),
                            Padding(
                              padding: const EdgeInsets.fromLTRB(18,10,18, 0),
                              child: Text("You can subscribe to notifications. If you have favorite meals and you subscribe you\'ll be notified on the day your favorite meal is on the daily menu exactly at 10 AM."),
                            ),
                            Padding(
                              padding: const EdgeInsets.only(bottom: 10),
                              child: Switch(
                                value: switchValue == 'yes' ? true : false,
                                activeColor: Color(0xffFFB200),
                                onChanged: (value) {
                                  setState(() {
                                    subscribeToNotifications(switchValue, token);
                                  });
                                },
                              ),
                            ),
                            Text("Free Meal", style: TextStyle(
                                fontSize: 25,
                                fontWeight: FontWeight.bold
                            ),),
                            Padding(
                              padding: const EdgeInsets.fromLTRB(18,10,18,10),
                              child: Text("On the receipt there's a QR code which you are able to scan. For every QR code scanned you profress by 10%. After 10 meals your next meal is free of charge! You have ${snapshot.data['signatures_count']} signatures."),
                            ),
                            Padding(
                              padding: EdgeInsets.all(15),
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
                      } else return Padding(
                        padding: const EdgeInsets.only(top: 24),
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: <Widget>[
                            Column(
                              crossAxisAlignment: CrossAxisAlignment.center,
                              children: <Widget>[
                                SizedBox(width: 50, height: 50, child: CircularProgressIndicator()),
                              ],
                            ),
                          ],
                        ),
                      );
                    }
                );
            } else return Padding(
              padding: const EdgeInsets.only(top: 24),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: <Widget>[
                  Column(
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: <Widget>[
                        SizedBox(width: 50, height: 50, child: CircularProgressIndicator()),
                      ],
                    ),
                ],
              ),
            );
          }
        ),
      ),
      drawer: NavigationDrawer(),
    );
  }

  void updateState() { setState(() {}); }
}
