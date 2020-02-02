import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:smooth_star_rating/smooth_star_rating.dart';

class ReviewMeal extends StatefulWidget{
  @override
  _ReviewMealState createState() => _ReviewMealState();
}

class _ReviewMealState extends State<ReviewMeal> {

  GlobalKey<ScaffoldState> scaffold_state = new GlobalKey<ScaffoldState>();
  IconData icon = Icons.favorite_border;
  var rating = 0.0;

  @override
  Widget build(BuildContext context) {

    Future<String> _getUserImage() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('img');
    }

    return Scaffold(
      appBar: AppBar(
          title: Text('Meal Detail'),
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
      key: scaffold_state,
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
            Center(child: Text("Rate and review", style: TextStyle(fontWeight: FontWeight.bold))),
            SmoothStarRating(
              color: Color(0xffFFB200),
              borderColor: Color(0xffFFB200),
              rating: rating,
              size: 30,
              starCount: 5,
              onRatingChanged: (value) {
                setState(() {
                  rating = value;
                });
              },
            ),
            Divider(),
            Padding(
              padding: const EdgeInsets.all(6.0),
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
                          Text("255 total",style: TextStyle(color: Colors.grey, fontSize: 14),)
                        ],
                      )),
                ],
              ),
            ),
            Container(
              height: 233,
              child: ListView.builder(
                itemCount: 4,
                itemBuilder: (context, index){
                  return ListTile(
                    leading: Icon(Icons.person, size: 30),
                    title: Text("Ime Prezime"),
                    subtitle: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: <Widget>[
                        Text("Komentar...."),
                        Padding(
                          padding: const EdgeInsets.fromLTRB(0, 3, 0, 0),
                          child: Row(
                            children: [
                              Icon(Icons.star, color: Colors.orangeAccent,size: 13.0),
                              Icon(Icons.star, color: Colors.orangeAccent,size: 13.0),
                              Icon(Icons.star, color: Colors.orangeAccent,size: 13.0),
                              Icon(Icons.star, color: Colors.orangeAccent,size: 13.0),
                              Icon(Icons.star_border, color: Colors.orangeAccent,size: 13.0),
                            ],
                          ),
                        ),
                      ],
                    )
                  );
                }
              )
            ),
        SizedBox(
          width: MediaQuery.of(context).size.width,
          child: Padding(
            padding: const EdgeInsets.all(5.0),
            child: RaisedButton(
                color: Color(0xffFFB200),
                onPressed: () {},
                child: Text('Load More Reviews', style: TextStyle(fontSize: 14, color: Colors.white))),
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
              backgroundColor: icon == Icons.favorite ? Colors.green : Colors.red,
              content:
              icon == Icons.favorite ? Text("Hamburger was added to favorites.") :
              Text("Hamburger removed from favorites"));
          scaffold_state.currentState.showSnackBar(snackBar);
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
