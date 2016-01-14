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

    // Main invoicing menu
    Route::get('/admin/invoice', function () {
        return view('admin.invoice');
    });

    // Customer
    Route::resource('customer', 'CustomerController');
    Route::get('customer/{customer}/delete', 'CustomerController@delete');

    // Invoice
    Route::resource('invoice', 'InvoiceController');
    Route::get('invoice/{customer}/create', 'InvoiceController@create'); // create invoice for given customer
    Route::get('invoice/{invoice}/delete', 'InvoiceController@delete');
    Route::get('invoice/{invoice}/print', 'InvoiceController@prnt');
    Route::get('invoice/{invoice}/email', 'InvoiceController@email');

    // Invoice item creation guided procedure
    Route::get('invoice/{invoice}/item/create1', 'InvoiceItemController@create1')->name('invoice_item.create1');
    Route::post('invoice/{invoice}/item/store1', 'InvoiceItemController@store1')->name('invoice_item.store1');
    Route::get('invoice/{invoice}/item/{category}/create2', 'InvoiceItemController@create2')->name('invoice_item.create2');
    Route::post('invoice/{invoice}/item/{category}/store2', 'InvoiceItemController@store2')->name('invoice_item.store2');

    // Invoice item
    Route::resource('invoice_item', 'InvoiceItemController');
    Route::get('invoice_item/{invoice_item}/create', 'InvoiceItemController@create')->name('invoice_item.create');
    Route::post('invoice_item/{invoice_item}/store', 'InvoiceItemController@store')->name('invoice_item.store');
    Route::get('invoice_item/{invoice_item}/delete', 'InvoiceItemController@delete');

    // Invoice item category
    Route::resource('invoice_item_category', 'InvoiceItemCategoryController');
    Route::get('invoice_item_category/{invoice_item_category}/delete', 'InvoiceItemCategoryController@delete');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
