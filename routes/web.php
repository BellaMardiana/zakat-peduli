<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/donasi', 'TransactionController@index')->name('trancastion.index');

Route::get('/donasi', 'TransactionController@create')->name('transaction.create');

Route::post('/validation', 'TransactionController@store')->name('transaction.store');

Route::get('/validation', 'TransactionController@index');

Route::get('/validation/upload', 'TransactionController@edit')->name('transaction.edit');

Route::put('/validation', 'TransactionController@update')->name('transaction.update');






