<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'UserController@login'); //do login
Route::post('register', 'UserController@store'); //create petugas


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::delete('user/{id}', "UserController@delete"); //delete poin
    Route::get('user/{id}', 'UserController@index'); //mencari user berdasarkan id
    Route::get('user/{limit}/{offset}', "UserController@getAll"); //menampilkan all user
	Route::post('logout', "UserController@logout"); //cek token
    
    Route::get('daily/{id}', "DailyController@index"); //read poin
    Route::get('daily/{limit}/{offset}', "DailyController@getAll"); //read poin
	Route::post('daily', 'DailyController@store'); //create poin
	Route::delete('daily/{id}', "DailyController@delete"); //delete poin

});