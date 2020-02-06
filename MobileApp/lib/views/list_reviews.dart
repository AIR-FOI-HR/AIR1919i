import 'dart:io';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:mobile_app/utils/exceptions.dart';
import 'dart:convert';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:mobile_app/globals/globals.dart' as globals;

class ListReviews extends StatefulWidget {
  // Get the Meal requested
  final mealId;
  ListReviews({Key key, @required this.mealId}) : super(key: key);

  @override
  _ListReviewsState createState() => _ListReviewsState(mealId: mealId);
}

class _ListReviewsState extends State<ListReviews> {
  // Take the Meal ID
  final mealId;
  _ListReviewsState({Key key, @required this.mealId});

  @override
  Widget build(BuildContext context) {

    // Retrieve User token from the local storage
    Future<String> _getUserToken() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('token');
    }

    // Get last 3 Meal reviews
    Future <Map<String, dynamic>> getMealReviews(token) async {
      final url = "${globals.backendUrl}/api/load-more-reviews/$mealId";
      final response = await http.get(
          url,
          headers: {
            HttpHeaders.authorizationHeader: 'Bearer $token'
          }
      );
      if (response.statusCode != 200) throw new ApiException(response.statusCode.toString(), "API Error" );
      Map<String, dynamic> apiResponse = json.decode(response.body);
      return apiResponse;
    }

    return Scaffold(
      appBar: AppBar(
          title: Text('All Reviews'),
          backgroundColor: Colors.black87,
          actions: <Widget>[
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Image.asset("assets/images/Logo.png",
                height: 45,
                width: 55,
              ),
            )
          ],
      ),
      body: SingleChildScrollView(
        child: FutureBuilder(
          future: _getUserToken(),
          builder: (BuildContext context, AsyncSnapshot snapshot) {
            if (snapshot.hasData) {
              String token = snapshot.data;
              return FutureBuilder(
                  future: getMealReviews(token),
                  builder: (BuildContext context, AsyncSnapshot snapshot) {
                    if (snapshot.hasData) {
                      return Padding(
                          padding: EdgeInsets.only(top: 25, bottom: 20),
                          child: ListView.builder(
                              physics: ClampingScrollPhysics(),
                              scrollDirection: Axis.vertical,
                              shrinkWrap: true,
                              itemCount: snapshot.data['reviews'].length,
                              itemBuilder: (context, index) {
                                List<Widget> icons = [];
                                var i = 0;
                                while (i < snapshot.data['reviews'][index]['stars']) { i++; icons.add(Icon(Icons.star, color: Color(0xffFFB200),size: 15.0)); }
                                while (i < 5) { i++; icons.add(Icon(Icons.star, color: Colors.grey,size: 15.0)); }
                                return Padding(
                                    padding: const EdgeInsets.only(bottom: 5),
                                    child: ListTile(
                                        leading: SizedBox(
                                          child: ClipRRect(
                                              borderRadius: BorderRadius.circular(80.0),
                                              child: Image.network("${globals.backendUrl}/${snapshot.data['reviews'][index]['user']['img']}", width: 50)
                                          ),
                                        ),
                                        title: Text("${snapshot.data['reviews'][index]['user']['name']}"),
                                        subtitle: Column(
                                          crossAxisAlignment: CrossAxisAlignment.start,
                                          children: <Widget>[
                                            Padding(
                                              padding: const EdgeInsets.only(left: 2),
                                              child: Text("${snapshot.data['reviews'][index]['comment']}"),
                                            ),
                                            Padding(
                                              padding: const EdgeInsets.fromLTRB(0, 1, 0, 0),
                                              child: Row(
                                                children: [
                                                  for (var item in icons) item
                                                ],
                                              ),
                                            ),
                                            new Divider(color: snapshot.data['reviews'].length == index + 1 ? Colors.transparent : Colors.black54),
                                          ],
                                        )
                                    )
                                );
                              }
                          )
                      );
                    } else return  Padding(
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
      )
    );
  }
}