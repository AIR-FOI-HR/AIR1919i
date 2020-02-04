import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:mobile_app/utils/exceptions.dart';
import 'package:mobile_app/views/list_reviews.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:smooth_star_rating/smooth_star_rating.dart';
import 'package:http/http.dart' as http;

class ReviewMeal extends StatefulWidget {
  final mealId;
  ReviewMeal({Key key, @required this.mealId}) : super(key: key);

  @override
  _ReviewMealState createState() => _ReviewMealState(mealId: mealId);
}

class _ReviewMealState extends State<ReviewMeal> {

  final mealId;
  _ReviewMealState({Key key, @required this.mealId});

  GlobalKey<ScaffoldState> scaffoldState = new GlobalKey<ScaffoldState>();
  IconData icon;
  var rating = 0.0;
  bool visible = false;
  bool pressed = false;
  final reviewText = new TextEditingController();
  final _formKey = GlobalKey<FormState>();

  void submitDataReview(){
    if (reviewText.text.isEmpty) return;
    else {
      visible = false;
      reviewText.text = "";
    }
  }

  @override
  Widget build(BuildContext context) {

    Future<String> _getUserImage() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('img');
    }

    // Returns meal data TODO => Send token from storage and authenticate.
    Future <Map<String, dynamic>> getMealData() async {
      final url = "http://192.168.0.34:8000/api/meals/$mealId";
      final response = await http.get(url);
      if (response.statusCode != 200) throw new ApiException(response.statusCode.toString(), "API Error" );
      Map<String, dynamic> apiResponse = json.decode(response.body);
      return apiResponse;
    }

    Future<bool> addToFavorites(mealId) async {
      final url = "http://192.168.0.34:8000/api/meals/$mealId?toggle_favorite=1";
      Map<String, String> body = { 'meal_id': mealId.toString() };
      final response = await http.put(url, body: body);
      return response.statusCode == 200 ? true : false;
    }

    return FutureBuilder(
        future: getMealData(),
        builder: (BuildContext context, AsyncSnapshot snapshot) {
          if (snapshot.hasData) {
            icon = snapshot.data['is_favorite'] ? Icons.favorite : Icons.favorite_border;
            List<Widget> icons = [];
            var i = 0;
            for (i; i < snapshot.data['stars']; i++) icons.add(Icon(Icons.star, color: Color(0xffFFB200),size: 15.0));
            for (i; i < 5; i++) icons.add(Icon(Icons.star, color: Colors.grey,size: 15.0));
            return Scaffold(
              appBar: AppBar(
                  title: Text("${snapshot.data["name"]}"),
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
                child: Container(
                  child: Column(
                    children: <Widget>[
                      Stack(
                        children: <Widget>[
                          Container(
                            height: MediaQuery.of(context).size.width * 0.35,
                            width: MediaQuery.of(context).size.width,
                            decoration: BoxDecoration(image: new DecorationImage(image: new NetworkImage("http://192.168.0.34:8000/${snapshot.data["img"]}"), fit: BoxFit.cover)
                            ),
                          ),
                          Container(
                            height: MediaQuery.of(context).size.width * 0.35,
                            width: MediaQuery.of(context).size.width,
                            decoration: BoxDecoration(
                              gradient: LinearGradient(
                                begin: Alignment.topCenter,
                                end: Alignment.bottomCenter,
                                colors: [
                                  const Color(0x00000000),
                                  const Color(0x00000000),
                                  const Color(0xCC000000),
                                  const Color(0xCC000000),
                                ],
                              ),
                            ),
                          ),
                          Positioned(
                              bottom: 44.0,
                              left: 8.0,
                              child: Text("${snapshot.data["name"]}",
                                  style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 18))),
                          Positioned(
                              bottom: 26.0,
                              left: 9.0,
                              child: Text("${snapshot.data["description"]}",style: TextStyle(color: Colors.white))),
                          Positioned(
                            bottom: 8.0,
                            left: 8.0,
                            child: Row(
                              children: [
                                for (var item in icons) item
                              ],
                            ),
                          ),
                          Positioned(
                            bottom: 8.0,
                            right: 8.0,
                            child: Row(
                              children: <Widget>[
                                Text("${snapshot.data["favorites_count"]} ", style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold,fontSize: 16)),
                                Icon(
                                  Icons.favorite,
                                  color: Colors.red,
                                  size: 18,
                                ),
                              ],
                            ),
                          ),
                        ],
                      ),
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
                      Center(child: Text("Rate and review", style: TextStyle(fontWeight: FontWeight.bold, fontSize: 16))),
                      Padding(
                        padding: EdgeInsets.only(top: 15),
                        child:     SmoothStarRating(
                          color: Color(0xffFFB200),
                          borderColor: Color(0xffFFB200),
                          rating: rating,
                          size: 35,
                          starCount: 5,
                          spacing: 10,
                          onRatingChanged: (value) {
                            setState(() {
                              rating = value;
                              visible = true;
                            });
                          },
                        ),
                      ),
                      Visibility(
                          visible: visible,
                          child: Padding(
                            padding: const EdgeInsets.fromLTRB(8, 0, 8, 0),
                            child: Form(
                                key: _formKey,
                                child: Column(
                                  children: <Widget>[
                                    Padding(
                                      padding: const EdgeInsets.fromLTRB(25, 25, 25, 15),
                                      child: TextFormField(
                                          keyboardType: TextInputType.text,
                                          controller: reviewText,
                                          decoration: new InputDecoration(
                                            hintText: "What did you think about this meal?",
                                            focusedBorder: UnderlineInputBorder(
                                              borderSide: BorderSide(color: Color(0xffFFB200)),
                                            ),
                                          ),
                                          validator: (value) {
                                            if(value.isEmpty) {
                                              return "Please leave a comment";
                                            }
                                            return null;
                                          }
                                      ),
                                    ),
                                    Padding(
                                      padding: const EdgeInsets.fromLTRB(25, 0, 25, 25),
                                      child: SizedBox(
                                        width: MediaQuery.of(context).size.width,
                                        height: 40,
                                        child: RaisedButton(
                                            color: Color(0xffFFB200),
                                            onPressed: () {
                                              if (_formKey.currentState.validate()) {
                                                submitDataReview();
                                                setState(() {
                                                  visible = false;
                                                  rating = 0.0;
                                                });
                                              }
                                            },
                                            child: Text('Post', style: TextStyle(fontSize: 14, color: Colors.white))),
                                      ),
                                    ),
                                  ],
                                )
                            ),
                          )
                      ),
                      Divider(),
                      Padding(
                        padding: const EdgeInsets.fromLTRB(0, 2, 2, 2),
                        child: Row(
                          children: <Widget>[
                            Expanded(
                                flex: 1,
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.start,
                                  children: <Widget>[
                                    Padding(
                                        padding: EdgeInsets.only(left: 17),
                                        child: Text("Recent Reviews",style: TextStyle(color: Colors.black, fontSize: 18, fontWeight: FontWeight.bold))
                                    )
                                  ],
                                )
                            ),
                            Expanded(
                                flex: 1,
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.end,
                                  children: <Widget>[
                                    Padding (
                                        padding: EdgeInsets.only(right: 17),
                                        child: Text("${snapshot.data["reviews_count"]} total",style: TextStyle(color: Colors.grey, fontSize: 16))
                                    )
                                  ],
                                )),
                          ],
                        ),
                      ),
                      Padding(
                        padding: EdgeInsets.only(top: 25),
                        child: Container(
                            child: ListView.builder(
                                physics: ClampingScrollPhysics(),
                                scrollDirection: Axis.vertical,
                                shrinkWrap: true,
                                itemCount: snapshot.data['reviews'].length,
                                itemBuilder: (context, index) {
                                  List<Widget> icons = [];
                                  var i = 0;
                                  for (i; i < snapshot.data['reviews'][index]['stars']; i++) icons.add(Icon(Icons.star, color: Color(0xffFFB200),size: 15.0));
                                  for (i; i < 5; i++) icons.add(Icon(Icons.star, color: Colors.grey,size: 15.0));
                                  return ListTile(
                                      leading: SizedBox(
                                          child: ClipRRect(
                                            borderRadius: BorderRadius.circular(80.0),
                                            child: Image.network("http://192.168.0.34:8000/${snapshot.data['reviews'][index]['user']['img']}", width: 50)
                                          ),
                                      ),
                                      title: Padding(
                                        padding: EdgeInsets.only(top: 10),
                                        child: Text("${snapshot.data['reviews'][index]['user']['name']}", style: TextStyle(fontWeight: FontWeight.bold)),
                                      ),
                                      subtitle: Padding(
                                        padding: EdgeInsets.only(top: 5),
                                        child: Column(
                                          crossAxisAlignment: CrossAxisAlignment.start,
                                          children: <Widget>[
                                            Text("${snapshot.data['reviews'][index]['comment']}"),
                                            Padding(
                                              padding: const EdgeInsets.fromLTRB(0, 1, 0, 0),
                                              child: Row(
                                                children: [
                                                  for (var item in icons) item
                                                ],
                                              ),
                                            ),
                                            new Divider(color: Colors.black54)
                                          ],
                                        )
                                      )
                                  );
                                }
                            )
                        ),
                      ),
                      Padding(
                        padding: EdgeInsets.all(15),
                        child:  SizedBox(
                          width: MediaQuery.of(context).size.width,
                          height: snapshot.data['reviews_counter'] > 3 ? 50 : 0,
                          child: Padding(
                            padding: const EdgeInsets.all(5.0),
                            child: snapshot.data['reviews_counter'] > 3 ? RaisedButton(
                                color: Color(0xffFFB200),
                                onPressed: () {
                                  Navigator.push(
                                      context,
                                      MaterialPageRoute(
                                          builder: (context) => ListReviews(mealId: snapshot.data['id'])
                                      ));
                                },
                                child: Text('Load More Reviews', style: TextStyle(fontSize: 15, color: Colors.white))) : Text("")
                          ),
                        ),
                      ),
                    ],
                  ),
                ),
              ),
              floatingActionButton: new FloatingActionButton(
                onPressed: () {
                  if (pressed) return;
                  pressed = true;
                  addToFavorites(snapshot.data["id"]);
                  changeFloatingIcon();
                  final snackBar = SnackBar(
                      elevation: 6.0,
                      duration:  const Duration(seconds: 2),
                      behavior: SnackBarBehavior.fixed,
                      backgroundColor: Colors.green,
                      content: icon == Icons.favorite ?
                      Row(children: <Widget> [
                        Icon(
                          Icons.favorite,
                          color: Colors.white,
                          size: 24.0,
                        ),
                        Text("  ${snapshot.data["name"]}", style: TextStyle(fontWeight: FontWeight.bold)),
                        Text(" was added to favorites."),
                      ])
                      : Row(children: <Widget> [
                        Icon(
                          Icons.favorite_border,
                          color: Colors.white,
                          size: 24.0,
                        ),
                        Text("  ${snapshot.data["name"]}", style: TextStyle(fontWeight: FontWeight.bold)),
                        Text(" was removed from favorites."),
                      ]));
                      scaffoldState.currentState.showSnackBar(snackBar).closed.then((SnackBarClosedReason reason) { pressed = false; });
                },
                child: new Icon(icon, size: 25.0),
                heroTag: null,
                backgroundColor: Color(0xffFD0034),
              ),
            );
          } else return CircularProgressIndicator();
        }
    );
  }

  void changeFloatingIcon() {
    setState(() {
      icon = icon == Icons.favorite_border ? Icons.favorite : Icons.favorite_border;
    });
  }
}
