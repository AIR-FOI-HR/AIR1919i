<?php

// Auth Endpoints
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'Api\LoginApiController@login');
    Route::post('logout', 'Api\LogoutApiController@logout');
    Route::post('register', 'Api\RegisterApiController@register');
    Route::post('forgot-password', 'Api\ForgotPasswordApiController@email');
    Route::post('password-reset', 'Api\ResetPasswordApiController@reset');
});

Route::apiResource('meals', 'Api\MealApiController');
Route::get('scan-qr-code', 'Api\QrCodeController@index');

// Not Found
Route::fallback(function(){
    return response()->json(['message' => 'Resource not found.'], 404);
});