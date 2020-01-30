import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/meal.dart';
import 'package:mobile_app/widgets/meal_list.dart';
import 'package:mobile_app/widgets/navigation_drawer.dart';
import 'package:qrscan/qrscan.dart' as scanner;

class DailyMenu extends StatefulWidget {
  @override
  DailyMenuState createState() => DailyMenuState();
}

class DailyMenuState extends State<DailyMenu> {

  void scanQRCode() async {
    String cameraScanResult = await scanner.scan();
    print('Printing QR Code Scan Result');
    print(cameraScanResult);
    // TODO => Send API request to backend, validate the request and return the result.
  }

  @override
  Widget build(BuildContext context) {

    final meals = Provider.of<MealProvider>(context).meals;

    return Scaffold(
      appBar: AppBar(title: Text('Daily Menu'), backgroundColor: Colors.black87),
      body: Center(
        child: mealList(context, meals),
      ),
      drawer: NavigationDrawer(),
      floatingActionButton: FloatingActionButton(
        backgroundColor: Colors.orange,
        onPressed: () {
          scanQRCode();
        },
        child: Image.asset('assets/images/QRCodeScan.png', width: 35, height: 35),
      ),
    );
  }
}
