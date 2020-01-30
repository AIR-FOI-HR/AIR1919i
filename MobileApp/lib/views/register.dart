import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/utils/validate.dart';
import 'package:mobile_app/styles/styles.dart';
import 'package:mobile_app/widgets/styled_flat_button.dart';

class Register extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Register'),
        backgroundColor: Colors.orange,
      ),
      body: Container(
        decoration: new BoxDecoration(
          image: new DecorationImage(
            image: new AssetImage('assets/images/LoginBackground.png'),
            fit: BoxFit.fill,
          ),
        ),
        child: Center(
          child: Padding(
            padding: const EdgeInsets.fromLTRB(30.0, 0.0, 30.0, 0.0),
            child: RegisterForm(),
          ),
        ),
      ),
    );
  }
}

class RegisterForm extends StatefulWidget {
  const RegisterForm({Key key}) : super(key: key);

  @override
  RegisterFormState createState() => RegisterFormState();
}

class RegisterFormState extends State<RegisterForm> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  String name;
  String email;
  String password;
  String passwordConfirm;
  String message = '';

  Map response = new Map();

  Future<void> submit() async {
    final form = _formKey.currentState;
    if (form.validate()) {
      response = await Provider.of<AuthProvider>(context).register(name, email, password, passwordConfirm);
      if (response['success']) Navigator.pop(context);
      else setState(() { message = response['message']; });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Form(
      key: _formKey,
      child: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Image.asset(
                'assets/images/Logo.png',
                width: 75,
                height: 75
            ),
            SizedBox(height: 15.0),
            Text(
              message,
              textAlign: TextAlign.center,
              style: Styles.error,
            ),
            SizedBox(height: 5.0),
            TextFormField(
                style: new TextStyle(color: Colors.white),
                decoration: Styles.input.copyWith(
                  hintText: 'Enter your name',
                  hintStyle: TextStyle(color: Colors.white),
                  labelText: 'Name',
                  labelStyle: TextStyle(color: Colors.white),
                  enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white))
                ),
                validator: (value) {
                  name = value.trim();
                  return Validate.requiredField(value, 'Name is required.');
                }
            ),
            SizedBox(height: 15.0),
            TextFormField(
                style: new TextStyle(color: Colors.white),
                decoration: Styles.input.copyWith(
                  hintText: 'Enter your email',
                  hintStyle: TextStyle(color: Colors.white),
                  labelText: 'Email',
                  labelStyle: TextStyle(color: Colors.white),
                  enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white))
                ),
                validator: (value) {
                  email = value.trim();
                  return Validate.validateEmail(value);
                }
            ),
            SizedBox(height: 15.0),
            TextFormField(
                style: new TextStyle(color: Colors.white),
                obscureText: true,
                decoration: Styles.input.copyWith(
                  hintText: 'Enter your password',
                  hintStyle: TextStyle(color: Colors.white),
                  labelText: 'Password',
                  labelStyle: TextStyle(color: Colors.white),
                  enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white))
                ),
                validator: (value) {
                  password = value.trim();
                  return Validate.requiredField(value, 'Password is required.');
                }
            ),
            SizedBox(height: 15.0),
            TextFormField(
                style: new TextStyle(color: Colors.white),
                obscureText: true,
                decoration: Styles.input.copyWith(
                  hintText: 'Confirm your password',
                  hintStyle: TextStyle(color: Colors.white),
                  labelText: 'Password Confirm',
                  labelStyle: TextStyle(color: Colors.white),
                  enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white))
                ),
                validator: (value) {
                  passwordConfirm = value.trim();
                  return Validate.requiredField(value, 'Password confirm is required.');
                }
            ),
            SizedBox(height: 30.0),
            StyledFlatButton(
              'Register',
              onPressed: submit,
            ),
          ],
        ),
      )
    );
  }
}
