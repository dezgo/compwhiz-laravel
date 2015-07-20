<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('content.index');
});

Route::get('/about', function () {
    return view('content.about');
});

Route::get('/services', function () {
    return view('content.services');
});

Route::get('/contact', function () {
    return view('content.contact');
});

Route::get('/subscribe', function () {
    return view('content.subscribe');
});
