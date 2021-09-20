<?php

//Route::get('/', function () {
//    return view('main');
//})->middleware('auth');
Route::get('/', 'HomeController@index')->name('home');



Route::post('extrato.por_intervalo', 'ContaController@buscarPorData')->name('extrato.por_intervalo')->middleware('auth');

Route::get('users', 'UserController@index')->name('users')->middleware('auth');
Route::get('user.edit', 'UserController@edit')->name('user.edit')->middleware('auth');
Route::get('user1.edit', 'UserController1@edit')->name('user1.edit')->middleware('auth');
Route::get('user.editcliente', 'UserController@editcliente')->name('user.editcliente')->middleware('auth');
Route::post('user.update', 'UserController@update')->name('user.update')->middleware('auth');
Route::post('user1.update', 'UserController1@update')->name('user1.update')->middleware('auth');
Route::post('user1.updatecliente', 'UserController@updatecliente')->name('user1.updatecliente')->middleware('auth');
Route::get('createuser', 'UserController@create')->name('createuser')->middleware('auth');
Route::post('storeuser', 'UserController@store')->name('storeuser')->middleware('auth');
Route::post('user.destroy', 'UserController@destroy')->name('user.destroy')->middleware('auth');
Route::post('search.user', 'UserController@search')->name('search.user')->middleware('auth');
Route::get('confirmdelete', 'UserController@confirmdelete')->name('confirmdelete')->middleware('auth');

Route::get('user.printcontrato', 'UserController@contratopdf')->name('user.printcontrato')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
