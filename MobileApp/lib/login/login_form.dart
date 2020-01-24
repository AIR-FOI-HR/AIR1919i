import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:mobile_app/login/login.dart';

class LoginForm extends StatefulWidget {
  @override
  State<LoginForm> createState() => _LoginFormState();
}

class _LoginFormState extends State<LoginForm> {
  final _usernameController = TextEditingController();
  final _passwordController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    _onLoginButtonPressed() {
      BlocProvider.of<LoginBloc>(context).add(
        LoginButtonPressed(
          username: _usernameController.text,
          password: _passwordController.text,
        ),
      );
    }

    return BlocListener<LoginBloc, LoginState>(
      listener: (context, state) {
        if (state is LoginFailure) {
          Scaffold.of(context).showSnackBar(
            SnackBar(
              content: Text('${state.error}'),
              backgroundColor: Colors.red,
            ),
          );
        }
      },
      child: BlocBuilder<LoginBloc, LoginState>(
        builder: (context, state) {
          return Container(
              decoration: new BoxDecoration(
                image: new DecorationImage(
                  image: new AssetImage('assets/images/LoginBackground.png'),
                  fit: BoxFit.fill,
                ),
              ),
              child: Form(
                child: Padding(
                  padding: const EdgeInsets.all(20.0),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Image.asset(
                          'assets/images/Logo.png',
                          width: 200,
                          height: 200
                      ),
                      TextFormField(
                        decoration: InputDecoration(
                            labelText: 'Username',
                            labelStyle: TextStyle(color: Colors.white),
                            enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white))
                        ),
                        controller: _usernameController,
                      ),
                      Padding(
                        padding: const EdgeInsets.only(top: 20.0),
                        child: TextFormField(
                          decoration: InputDecoration(
                              labelText: 'Password',
                              labelStyle: TextStyle(color: Colors.white),
                              enabledBorder: new UnderlineInputBorder(borderSide: new BorderSide(color: Colors.white))
                          ),
                          controller: _passwordController,
                          obscureText: true,
                        ),
                      ),
                      Padding(
                          padding: const EdgeInsets.only(top: 40.0),
                          child: SizedBox(
                              width: double.infinity,
                              height: 50,
                              child: RaisedButton(
                                shape: RoundedRectangleBorder(
                                  borderRadius: new BorderRadius.circular(5.0),
                                ),
                                color: Colors.orange,
                                textColor: Colors.white,
                                onPressed: state is! LoginLoading
                                    ? _onLoginButtonPressed
                                    : null,
                                child: Text('Login'),
                              )
                          )
                      ),
                      Padding(
                        padding: const EdgeInsets.only(top: 40.0),
                        child: Row(children: <Widget>[
                          Expanded(
                            child: new Container(
                                margin: const EdgeInsets.only(right: 20.0),
                                child: Divider(
                                  color: Colors.white,
                                  height: 36,
                                )),
                          ),
                          Text('New user?',
                              style: TextStyle(color: Colors.white)),
                          Expanded(
                            child: new Container(
                                margin: const EdgeInsets.only(left: 20.0),
                                child: Divider(
                                  color: Colors.white,
                                  height: 36,
                                )),
                          ),
                        ]),
                      ),
                      Padding(
                          padding: const EdgeInsets.only(top: 40.0),
                          child: SizedBox(
                              width: double.infinity,
                              height: 50,
                              child: FlatButton(
                                shape: RoundedRectangleBorder(
                                    borderRadius: new BorderRadius.circular(
                                        5.0),
                                    side: BorderSide(color: Colors.orange)
                                ),
                                color: Colors.transparent,
                                textColor: Colors.orange,
                                onPressed: state is! LoginLoading
                                    ? _onLoginButtonPressed
                                    : null,
                                child: Text('Create a new account'),
                              )
                          )
                      ),
                      Container(
                        child: state is LoginLoading
                            ? CircularProgressIndicator()
                            : null,
                      ),
                    ],
                  ),
                ),
              )
          );
        },
      ),
    );
  }
}