import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/auth.dart';

// Loading widget used for display while the User is in status Uninitialized
class Loading extends StatelessWidget {

  initAuthProvider(context) async {
    Provider.of<AuthProvider>(context).initAuthProvider();
  }

  @override
  Widget build(BuildContext context) {

    initAuthProvider(context);

    return Scaffold(
      appBar: AppBar(
        title: Text('Bistro Deno'),
      ),
      body: Center(
        child: Container(
          child: Padding(
            padding: const EdgeInsets.fromLTRB(30.0, 0.0, 30.0, 0.0),
            child: new CircularProgressIndicator(),
          ),
        ),
      ),
    );
  }
}