<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'UserController@login'); //do login
Route::post('register', 'UserController@store'); //create user


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::delete('user/{id}', "UserController@delete"); //delete poin
    Route::get('user/{id}', 'UserController@index'); //mencari user berdasarkan id
    Route::get('user/{limit}/{offset}', "UserController@getAll"); //menampilkan all user
	Route::post('logout', "UserController@logout"); //cek token
    
    Route::get('daily/{id}', "DailyController@index"); //read daily
    Route::get('daily/{limit}/{offset}', "DailyController@getAll"); //read daily
	Route::post('daily', 'DailyController@store'); //create daily
	Route::delete('daily/{id}', "DailyController@delete"); //delete daily

});