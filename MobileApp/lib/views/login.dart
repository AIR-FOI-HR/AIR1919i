import 'package:flutter/material.dart';
import 'package:flutter/gestures.dart';
import 'package:mobile_app/views/password_reset.dart';
import 'package:mobile_app/views/register.dart';
import 'package:provider/provider.dart';
import 'package:mobile_app/providers/auth.dart';
import 'package:mobile_app/utils/validate.dart';
import 'package:mobile_app/utils/slide_route.dart';
import 'package:mobile_app/styles/styles.dart';
import 'package:mobile_app/widgets/notification_text.dart';
import 'package:mobile_app/widgets/styled_flat_button.dart';

class LogIn extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
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
            child: LogInForm(),
          )
        ),
      ),
    );
  }
}

class LogInForm extends StatefulWidget {
  const LogInForm({Key key}) : super(key: key);

  @override
  LogInFormState createState() => LogInFormState();
}

class LogInFormState extends State<LogInForm> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

  String email;
  String password;
  String message = '';

  Future<void> submit() async {
    final form = _formKey.currentState;
    if (form.validate())  await Provider.of<AuthProvider>(context).login(email, password);
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
            SizedBox(height: 10.0),
            Consumer<AuthProvider>(
              builder: (context, provider, child) => provider.notification ?? NotificationText(''),
            ),
            SizedBox(height: 30.0),
            TextFormField(
                style: new TextStyle(color: Colors.white),
                decoration: Styles.input.copyWith(
                  hintText: 'Enter your email address',
                  hintStyle: TextStyle(color: Colors.white),
                  labelText: 'Email',
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
            TextFormField(
                style: new TextStyle(color: Colors.white),
                obscureText: true,
                decoration: Styles.input.copyWith(
                  hintText: 'Enter your password',
                  hintStyle: TextStyle(color: Colors.white),
                  labelText: 'Password',
                  labelStyle: TextStyle(color: Colors.white),
                  enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white)),
                  errorStyle: TextStyle(color: Color(0xfffa2020))
                ),
                validator: (value) {
                  password = value.trim();
                  return Validate.requiredField(value, 'Password is required.');
                }
            ),
            SizedBox(height: 15.0),
            StyledFlatButton(
              'Login',
              onPressed: submit,
            ),
            SizedBox(height: 20.0),
            Center(
              child: RichText(
                text: TextSpan(
                  children: [
                    TextSpan(
                      text: "Don't have an account? ",
                      style: Styles.p,
                    ),
                    TextSpan(
                      text: 'Register.',
                      style: Styles.p.copyWith(color: Colors.orange),
                      recognizer: TapGestureRecognizer()
                        ..onTap = () => {
                          Navigator.push(context, SlideRoute(page: Register(), from: -1.0))
                        },
                    ),
                  ],
                ),
              ),
            ),
            SizedBox(height: 5.0),
            Center(
              child: RichText(
                text: TextSpan(
                    text: 'Forgot Your Password?',
                    style: Styles.p.copyWith(color: Colors.orange),
                    recognizer: TapGestureRecognizer()
                      ..onTap = () => {
                        Navigator.push(context, SlideRoute(page: PasswordReset(), from: -1.0))
                      }
                ),
              ),
            ),
          ],
        ),
      )
    );
  }
}
