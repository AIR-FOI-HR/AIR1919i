<?php

// Auth Endpoints
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'Api\Auth\LoginApiController@login');
    Route::post('logout', 'Api\Auth\LogoutApiController@logout');
    Route::post('register', 'Api\Auth\RegisterApiController@register');
    Route::post('forgot-password', 'Api\Auth\ForgotPasswordApiController@email');
    Route::post('password-reset', 'Api\Auth\ResetPasswordApiController@reset');
});

Route::apiResource('meals', 'Api\MealApiController')->only(['index', 'show', 'update']);;
Route::apiResource('load-more-reviews', 'Api\ReviewApiController')->only(['show']);;
Route::post('scan-qr-code', 'Api\QrCodeApiController@index');
Route::post('subscribe-to-notifications', 'Api\SubscriptionApiController@index');
Route::get('my-profile', 'Api\MyProfileApiController@index');

// Not Found
Route::fallback(function(){
    return response()->json(['message' => 'Resource not found.'], 404);
});