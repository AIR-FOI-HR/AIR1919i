import 'dart:convert';
import 'dart:io';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:mobile_app/models/meal.dart';
import 'package:mobile_app/utils/exceptions.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:qrscan/qrscan.dart' as scanner;
import 'package:intl/intl.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class DailyMenu extends StatefulWidget {
  @override
  DailyMenuState createState() => DailyMenuState();
}

class DailyMenuState extends State<DailyMenu> {

  final GlobalKey<ScaffoldState> _scaffoldKey = new GlobalKey<ScaffoldState>();
  final reviewPin = new TextEditingController();
  final _formKey = GlobalKey<FormState>();
  void scanQRCode() async {
    Navigator.of(context).pop();
    String cameraScanResult = await scanner.scan();
    if (cameraScanResult.isEmpty) return;
    submitDataPin(cameraScanResult, qrScan: true);
  }

  void _showDialogPin(){
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: new Text("Your PIN"),
          content: Form(
              key: _formKey,
              child: TextFormField(
                  keyboardType: TextInputType.text,
                  controller: reviewPin,
                  maxLength: 8,
                  decoration: new InputDecoration(
                    hintText: "Enter the PIN given on your invoice",
                    focusedBorder: UnderlineInputBorder(
                      borderSide: BorderSide(color: Color(0xffFFB200)),
                    ),
                  ),
                  validator: (value) {
                    if (value.isEmpty) return "Please enter the PIN";
                    if (value.length != 8) return "PIN must be exactly 8 characters in length";
                    return null;
                  }
              )
          ),
            actions: <Widget>[
              new FlatButton(
                color: Color(0xffFFB200),
                child: new Text("Post",style: TextStyle(color: Colors.white),),
                onPressed: () {
                  if (_formKey.currentState.validate() && reviewPin.text.isNotEmpty) {
                    Navigator.of(context).pop();
                    Widget message = FutureBuilder<String>(
                        future: submitDataPin(reviewPin.text, qrScan: false),
                        builder: (BuildContext context, AsyncSnapshot snapshot) {
                          return snapshot.hasData ?  Text("${snapshot.data}") : Text("Something went wrong");
                        }
                    );
                    _scaffoldKey.currentState.showSnackBar(
                        SnackBar(
                            elevation: 6.0,
                            duration:  const Duration(seconds: 2),
                            behavior: SnackBarBehavior.fixed,
                            backgroundColor: Colors.blue,
                            content: message
                      ));
                  }
                },
              ),
              new FlatButton(
                color: Color(0xffFFB200),
                child: new Text("Close",style: TextStyle(color: Colors.white),),
                onPressed: () {
                  Navigator.of(context).pop();
                },
              ),
            ]
        );
      }
    );
  }

  void _showDialog() {
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: new Text("Select signature collection type"),
          content: new Text("Signature collection via PIN or by QR code scan"),
          actions: <Widget>[
            new FlatButton(
              color: Color(0xffFFB200),
              child: new Text("PIN", style: TextStyle(color: Colors.white),),
              onPressed: () {
                Navigator.of(context).pop();
                _showDialogPin();
              },
            ),
            new FlatButton(
              color: Color(0xffFFB200),
              child: new Text("QRcode",style: TextStyle(color: Colors.white),),
              onPressed: () {
                scanQRCode();
              },
            ),
          ],
        );
      },
    );
  }

  Future<String> submitDataPin(code, { qrScan: false}) async {
      final url = "http://192.168.0.34:8000/api/scan-qr-code";
      Map<String, String> body = { 'code' : code };
      final response = await http.post(url, body: body);
      reviewPin.text = "";
      Map<String, dynamic> apiResponse = json.decode(response.body);
      if (!qrScan) return response.statusCode == 200 ? apiResponse["message"] : "Something went wrong.";
      else {
        _scaffoldKey.currentState.showSnackBar(
            SnackBar(
                elevation: 6.0,
                duration:  const Duration(seconds: 2),
                behavior: SnackBarBehavior.fixed,
                backgroundColor: Colors.blue,
                content: Text("${apiResponse["message"]}")
          ));
      }
      return "Success";
  }

  @override
  Widget build(BuildContext context) {

    Future<String> _getUserToken() async{
      final SharedPreferences sharedPrefs = await SharedPreferences.getInstance();
      return sharedPrefs.getString('token');
    }

    Future <List<Meal>> getTodaysMeals(token) async {
      final url = "http://192.168.0.34:8000/api/meals?day=${new DateTime.now().weekday}";
      final response = await http.get(
        url,
        headers: {
          HttpHeaders.authorizationHeader: 'Bearer $token'
        },
      );
      if (response.statusCode != 200) throw new ApiException(response.statusCode.toString(), "API Error" );
      Map<String, dynamic> apiResponse = json.decode(response.body);
      List<dynamic> data = apiResponse['data'];
      List<Meal> meals = mealFromJson(json.encode(data));
      return meals;
    }

    // Get current day and date
    DateTime now = new DateTime.now();
    String formattedDay =  DateFormat('EEEE').format(now);
    String formattedDate = DateFormat('dd.MM.yyyy.').format(now);

    return Scaffold(
      key: _scaffoldKey,
      appBar: AppBar(
          title: Text('Daily Menu'),
          backgroundColor: Colors.black87,
          actions: <Widget>[
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Image.asset("assets/images/Logo.png",
                height: 45,
              width: 55,),
            )]
      ),
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: <Widget>[
            Padding(
              padding: const EdgeInsets.fromLTRB(32, 25, 10, 0),
              child: Text("$formattedDay", style: new TextStyle(fontSize: 23.0, fontWeight: FontWeight.w900)),
            ),
            Padding(
              padding: const EdgeInsets.fromLTRB(32, 3, 10, 16),
              child: Text("$formattedDate", style: new TextStyle(color: Color(0xff959597), fontSize: 18.0, fontWeight: FontWeight.normal)),
            ),
            Padding(
              padding: EdgeInsets.fromLTRB(10.0,0,10.0,0),
                child: FutureBuilder(
                    future: _getUserToken(),
                    builder: (BuildContext context, AsyncSnapshot snapshot) {
                      if (snapshot.hasData) {
                        return FutureBuilder(
                            future: getTodaysMeals(snapshot.data),
                            builder: (BuildContext context, AsyncSnapshot snapshot) {
                              if (snapshot.hasData) {
                                return mealList(context, snapshot.data);
                              } else return CircularProgressIndicator();
                            }
                        );
                      } else return CircularProgressIndicator();
                    }
                ),
            )
          ],
        ),
      ),
      drawer: NavigationDrawer(),
      floatingActionButton: FloatingActionButton(
        backgroundColor: Color(0xffFFB200),
        onPressed: () {
          _showDialog();
        },
        child: Image.asset('assets/images/QRCodeScan.png', width: 35, height: 35),
      ),
    );
  }
}