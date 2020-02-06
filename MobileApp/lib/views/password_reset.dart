import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/utils/validate.dart';
import 'package:mobile_app/styles/styles.dart';
import 'package:mobile_app/widgets/styled_flat_button.dart';

class PasswordReset extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Password Reset'),
        backgroundColor: Colors.orange,
      ),
      body: Center(
        child: Container(
          decoration: new BoxDecoration(
            image: new DecorationImage(
              image: new AssetImage('assets/images/LoginBackground.png'),
              fit: BoxFit.fill,
            ),
          ),
          child: Center(
              child: Padding(
                padding: EdgeInsets.fromLTRB(30.0, 0.0, 30.0, 0.0),
                child: PasswordResetForm(),
              )
          )
        ),
      ),
    );
  }
}

class PasswordResetForm extends StatefulWidget {
  const PasswordResetForm({Key key}) : super(key: key);

  @override
  PasswordResetFormState createState() => PasswordResetFormState();
}

class PasswordResetFormState extends State<PasswordResetForm> {

  // Initialize data
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  String email;
  String password;
  String message = '';

  Map response = new Map();

  // Submit the forgotten pasword form
  Future<void> submit() async {
    final form = _formKey.currentState;
    if (form.validate()) {
      bool success = await Provider.of<AuthProvider>(context, listen: false).passwordReset(email);
      if (success) Navigator.pop(context);
      else setState(() { message = 'An error occurred during password reset.'; });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Form(
      key: _formKey,
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.stretch,
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          Image.asset(
              'assets/images/Logo.png',
              width: 75,
              height: 75
          ),
          SizedBox(height: 10.0),
          Text(
            message,
            textAlign: TextAlign.center,
            style: Styles.error,
          ),
          SizedBox(height: 5.0),
          TextFormField(
            style: new TextStyle(color: Colors.white),
            decoration: Styles.input.copyWith(
              hintText: 'Email',
              hintStyle: TextStyle(color: Colors.white),
              labelText: 'Enter your email address',
              labelStyle: TextStyle(color: Colors.white),
              enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white)),
              errorStyle: TextStyle(color: Color(0xfffa2020))
            ),
            validator: (value) {
              email = value.trim();
              return Validate.validateEmail(value);
            }
          ),
          SizedBox(height: 15.0),
          StyledFlatButton(
            'Send Password Reset Email',
            onPressed: submit,
          ),
        ],
      ),
    );
  }
}
