<?php

Auth::routes();

Route::get('/', function () { return view('/welcome');});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/testing', 'TestingController@index');

Route::post('/send-notification', 'NotificationController@index')->name('send-notification');