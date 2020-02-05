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

// Meals API Resource
Route::apiResource('meals', 'Api\MealApiController')->only(['index', 'show', 'update']);

// Reviews API Resource
Route::apiResource('load-more-reviews', 'Api\ReviewApiController')->only(['show']);

// Scan the QRcode or the PIN sent
Route::post('scan-qr-code', 'Api\QrCodeApiController@index');

// Toggle the User's notification subscription
Route::post('subscribe-to-notifications', 'Api\SubscriptionApiController@index');

// My Profile API data
Route::get('my-profile', 'Api\MyProfileApiController@index');