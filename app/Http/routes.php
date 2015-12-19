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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Invoicing routes
Route::get('/admin/invoice', [
    'middleware' => 'admin',
    function ()
    {
        return view('admin.invoice');
    }
]);

Route::get('invoice/item', [
    'middleware' => 'admin',
    'uses' => 'Invoice\InvoiceItemController@create'
]);

Route::post('invoice/item', [
    'as' => 'invoice/store_item',
    'middleware' => 'admin',
    'uses' => 'Invoice\InvoiceItemController@store'
]);

Route::get('invoice/customer', [
    'middleware' => 'admin',
    function ()
    {
        return view('invoice.create_customer');
    }
]);

Route::post('invoice/customer', [
    'as' => 'invoice/store_customer',
    'middleware' => 'admin',
    'uses' => 'Invoice\CustomerController@store'
]);

