import 'package:flutter/material.dart';

class ListReviews extends StatefulWidget{
  @override
  _ListReviewsState createState() => _ListReviewsState();
}

class _ListReviewsState extends State<ListReviews> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
          title: Text('All reviews'),
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
      body: ListView.builder(
          itemCount: 55,
          itemBuilder: (context, index){
            return Padding(
              padding: const EdgeInsets.all(1.0),
              child: ListTile(
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
                      new Divider( color: Colors.black54,),
                    ],
                  )
              ),
            );
          }
      )
    );
  }

}