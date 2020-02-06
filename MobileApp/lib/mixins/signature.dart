import 'dart:convert';
import 'dart:io';
import 'dart:ui';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:mobile_app/globals/globals.dart' as globals;

// Modular class for signature collection
abstract class Signature {
  Future<String> submitDataPin(code, token, pin, scaffoldKey, { qrScan: false}) async {
    final url = "${globals.backendUrl}/api/scan-qr-code";
    Map<String, String> body = { 'code' : code };
    final response = await http.post(
        url,
        headers: {
          HttpHeaders.authorizationHeader: 'Bearer $token'
        },
        body: body
    );
    pin.text = "";
    Map<String, dynamic> apiResponse = json.decode(response.body);
    if (!qrScan) return response.statusCode == 200 ? apiResponse["message"] : "Something went wrong.";
    scaffoldKey.currentState.showSnackBar(
    SnackBar(
      elevation: 6.0,
      duration:  const Duration(seconds: 2),
      behavior: SnackBarBehavior.fixed,
      backgroundColor: Color(0xffFFB200),
      content: Text("${apiResponse["message"]}")
    ));
    return "Success";
  }
}