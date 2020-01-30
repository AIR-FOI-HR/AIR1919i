import 'package:flutter/material.dart';
import 'package:mobile_app/main.dart';
import 'package:mobile_app/views/my_profile.dart';
import 'package:mobile_app/views/weekly_menu.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/utils/slide_route.dart';

class NavigationDrawer extends StatelessWidget {
  @override
  Widget build(BuildContext context) {

//    print(ModalRoute.of(context).settings.name); TODO => Highlight current route in navigation drawer

    return  Drawer(
        child: Container(color: Colors.black87,
          child: ListView(
            // Important: Remove any padding from the ListView.
            padding: EdgeInsets.zero,
            children: <Widget>[
              DrawerHeader(
                  margin: EdgeInsets.zero,
                  padding: EdgeInsets.zero,
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: <Widget>[
                      Padding(
                        padding: const EdgeInsets.only(left: 20.0, top: 12.0),
                        child: ClipRRect(
                          borderRadius: new BorderRadius.circular(50.0),
                          child: Image.asset(
                              'assets/images/butterflywings55.jpg',
                              width: 75,
                              height: 75
                          ),
                        ),
                      ),
                      Padding(
                        padding: const EdgeInsets.only(left: 20.0, top: 8.0),
                        child: Text('butterflywings55', style: TextStyle(color: Colors.white, fontSize: 20.0, fontWeight: FontWeight.w500)),
                      ),
                      Padding(
                          padding: const EdgeInsets.only(top: 5.0),
                          child: Row(
                            children: [
                              Expanded(
                                child: new Container(
                                    child: Divider(
                                      color: Colors.white,
                                      height: 36,
                                    )),
                              )],
                          )
                      ),
                    ],
                  )),
              ListTile(
                leading: Icon(Icons.restaurant_menu, color: Colors.grey),
                title: Text('Daily Menu', style: TextStyle(color: Colors.grey)),
                onTap: () {
                  Navigator.push(context, SlideRoute(page: Router(), from: 1.0));
                }
              ),
              ListTile(
                leading: Icon(Icons.menu, color: Colors.grey),
                title: Text('Weekly Menu', style: TextStyle(color: Colors.grey)),
                onTap: () {
                  Navigator.push(context, SlideRoute(page: WeeklyMenu(), from: 1.0));
                },
              ),
              ListTile(
                leading: Icon(Icons.account_circle, color: Colors.grey),
                title: Text('My Profile', style: TextStyle(color: Colors.grey)),
                onTap: () {
                  Navigator.push(context, SlideRoute(page: MyProfile(), from: 1.0));
                },
              ),
              ListTile(
                leading: Icon(Icons.exit_to_app, color: Colors.grey),
                title: Text('Logout', style: TextStyle(color: Colors.grey)),
                onTap: () {
                  Navigator.pop(context);
                  Provider.of<AuthProvider>(context).logOut();
                  Navigator.of(context).popUntil(ModalRoute.withName('/')); // TODO => Fix animation
                },
              ),
            ],
          ),
        )
    );
  }
}