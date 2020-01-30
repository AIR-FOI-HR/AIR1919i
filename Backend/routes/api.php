<?php

// Auth Endpoints
Route::group([
    'prefix' => 'v1/auth',
], function () {
    Route::post('login', 'Api\LoginApiController@login');
    Route::post('logout', 'Api\LogoutApiController@logout');
    Route::post('register', 'Api\RegisterApiController@register');
    Route::post('forgot-password', 'Api\ForgotPasswordApiController@email');
    Route::post('password-reset', 'Api\ResetPasswordApiController@reset');
});

// Resource Endpoints
Route::group([
    'prefix' => 'v1'
], function () {
    Route::apiResource('meals', 'Api\MealApiController');
    Route::get('scan-qr-code', 'Api\QRCodeController@index');
});

// Not Found
Route::fallback(function(){
    return response()->json(['message' => 'Resource not found.'], 404);
});