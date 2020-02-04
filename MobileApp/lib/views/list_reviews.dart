import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:mobile_app/utils/exceptions.dart';
import 'dart:convert';

class ListReviews extends StatefulWidget {

  final mealId;
  ListReviews({Key key, @required this.mealId}) : super(key: key);

  @override
  _ListReviewsState createState() => _ListReviewsState(mealId: mealId);
}

class _ListReviewsState extends State<ListReviews> {

  final mealId;
  _ListReviewsState({Key key, @required this.mealId});

  @override
  Widget build(BuildContext context) {

    Future <Map<String, dynamic>> getMealReviews() async {
      final url = "http://192.168.0.34:8000/api/load-more-reviews/$mealId";
      final response = await http.get(url);
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
            future: getMealReviews(),
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
                        for (i; i < snapshot.data['reviews'][index]['stars']; i++) icons.add(Icon(Icons.star, color: Color(0xffFFB200),size: 15.0));
                        for (i; i < 5; i++) icons.add(Icon(Icons.star, color: Colors.grey,size: 15.0));
                        return Padding(
                            padding: const EdgeInsets.only(bottom: 5),
                            child: ListTile(
                                leading: SizedBox(
                                  child: ClipRRect(
                                      borderRadius: BorderRadius.circular(80.0),
                                      child: Image.network("http://192.168.0.34:8000/${snapshot.data['reviews'][index]['user']['img']}", width: 50)
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
              } else return CircularProgressIndicator();
            }
        )
      )
    );
  }
}