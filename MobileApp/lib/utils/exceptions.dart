// Deals with Auth Exception
class AuthException implements Exception {
  AuthException(this.code, this.message);

  final String code;
  final String message;
}

// Handles API exceptions
class ApiException implements Exception {
  ApiException(this.code, this.message);

  final String code;
  final String message;
}