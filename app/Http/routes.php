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

// admin-only routes
Route::group(['middleware' => 'admin'], function() {

    // Invoicing routes
    Route::get('/admin/invoice', function () {
        return view('admin.invoice');
    });

    Route::resource('customer', 'CustomerController');
    Route::get('customer/{customer}/delete', 'CustomerController@delete');
    Route::resource('invoice', 'InvoiceController');
    Route::get('invoice/{invoice}/create', 'InvoiceController@create'); // create invoice for given customer
    Route::get('invoice/{invoice}/delete', 'InvoiceController@delete');
    Route::get('invoice/{invoice}/print', 'InvoiceController@prnt');
    Route::get('invoice/{invoice}/email', 'InvoiceController@email');
    Route::get('invoiceitem/select', 'InvoiceItemController@select');
    Route::get('invoiceitem/clear', 'InvoiceItemController@clear');
    Route::resource('invoiceitem', 'InvoiceItemController');
    Route::get('invoiceitem/{invoiceitem}/delete', 'InvoiceItemController@delete');
    Route::resource('invoiceitemcategory', 'InvoiceItemCategoryController');
    Route::get('invoiceitemcategory/{invoiceitemcategory}/delete', 'InvoiceItemCategoryController@delete');
});
