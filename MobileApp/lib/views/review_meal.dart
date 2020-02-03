import 'package:flutter/material.dart';
import 'package:mobile_app/views/list_reviews.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:smooth_star_rating/smooth_star_rating.dart';

class ReviewMeal extends StatefulWidget{
  @override
  _ReviewMealState createState() => _ReviewMealState();
}

class _ReviewMealState extends State<ReviewMeal> {

  GlobalKey<ScaffoldState> scaffoldState = new GlobalKey<ScaffoldState>();
  IconData icon = Icons.favorite_border;
  var rating = 0.0;
  bool visible = false;
  final reviewText = new TextEditingController();
  final _formKey = GlobalKey<FormState>();

  void submitDataReview(){
    if(reviewText.text.isEmpty){
      return;
    }
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

    return Scaffold(
      appBar: AppBar(
          title: Text('Meal reviews'),
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
      body: Container(
        child: Column(
          children: <Widget>[
            Stack(
              children: <Widget>[
                Image(
                  fit: BoxFit.cover,
                  image: AssetImage("assets/images/hamburger.jpg"),
                  height: MediaQuery.of(context).size.width * 0.35,
                  width: MediaQuery.of(context).size.width,
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
                    child: Text("Hamburger",
                        style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 18))),
                Positioned(
                    bottom: 28.0,
                    left: 8.0,
                    child: Text("Sadrazaj",style: TextStyle(color: Colors.white))),
                Positioned(
                  bottom: 8.0,
                  left: 8.0,
                  child: Row(
                    children: [
                      Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                      Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                      Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                      Icon(Icons.star, color: Color(0xffFFB200),size: 16.0),
                      Icon(Icons.star_border, color: Color(0xffFFB200),size: 16.0),
                    ],
                  ),
                ),
                Positioned(
                  bottom: 8.0,
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
            Center(child: Text("Rate and review", style: TextStyle(fontWeight: FontWeight.bold))),
            SmoothStarRating(
              color: Color(0xffFFB200),
              borderColor: Color(0xffFFB200),
              rating: rating,
              size: 25,
              starCount: 5,
              onRatingChanged: (value) {
                setState(() {
                  rating = value;
                  visible = true;
                });
              },
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
                    padding: const EdgeInsets.fromLTRB(0,0,0,7),
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
                          return "Please enter some text";
                        }
                        return null;
                      }
                    ),
                  ),
                  SizedBox(
                    width: MediaQuery.of(context).size.width,
                    height: 25,
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
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Text("Recent Reviews",style: TextStyle(color: Colors.black, fontSize: 15, fontWeight: FontWeight.bold),)
                        ],
                      )),
                  Expanded(
                      flex: 1,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Text("55 total",style: TextStyle(color: Colors.grey, fontSize: 14),)
                        ],
                      )),
                ],
              ),
            ),
            Container(
              height: visible==true ? 160 : 180,
              child: ListView.builder(
                itemCount: 4,
                itemBuilder: (context, index){
                  return ListTile(
                      leading: CircleAvatar(
                          radius: 25,
                          backgroundImage: ExactAssetImage("assets/images/butterflywings55.jpg")
                      ),
                    title: Text("Ime Prezime"),
                    subtitle: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: <Widget>[
                        Text("Komentar Komentar Komentar Komentar Komentar Komentar Komentar Komentar"),
                        Padding(
                          padding: const EdgeInsets.fromLTRB(0, 1, 0, 0),
                          child: Row(
                            children: [
                              Icon(Icons.star, color: Colors.orangeAccent,size: 12.0),
                              Icon(Icons.star, color: Colors.orangeAccent,size: 12.0),
                              Icon(Icons.star, color: Colors.orangeAccent,size: 12.0),
                              Icon(Icons.star, color: Colors.orangeAccent,size: 12.0),
                              Icon(Icons.star_border, color: Colors.orangeAccent,size: 12.0),
                            ],
                          ),
                        ),
                        new Divider(color: Colors.black54)
                      ],
                    )
                  );
                }
              )
            ),
        SizedBox(
          width: MediaQuery.of(context).size.width,
          height: 38,
          child: Padding(
            padding: const EdgeInsets.all(5.0),
            child: RaisedButton(
                color: Color(0xffFFB200),
                onPressed: () {
                  Navigator.push(
                      context,
                      MaterialPageRoute(
                      builder: (context) => ListReviews()
                  ));
                },
                child: Text('Load More Reviews', style: TextStyle(fontSize: 13, color: Colors.white))),
          ),
        ),
          ],
        ),
      ),
      floatingActionButton: new FloatingActionButton(
        onPressed: () {
          changeFloatingIcon();
          final snackBar = SnackBar(
              elevation: 6.0,
              behavior: SnackBarBehavior.floating,
              backgroundColor: Colors.green,
              content:
              icon == Icons.favorite ? Text("Hamburger was added to favorites.") :
              Text("Hamburger removed from favorites."));
          scaffoldState.currentState.showSnackBar(snackBar);
        },
        child: new Icon(icon, size: 25.0),
        heroTag: null,
        backgroundColor: Color(0xffFD0034),
      ),
    );
  }

  void changeFloatingIcon(){
    setState(() {
      icon = icon == Icons.favorite_border ? Icons.favorite : Icons.favorite_border;
    }
    );
  }
}
