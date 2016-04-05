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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

});


#Route::get('/edit', ['middleware'=>'auth' 'uses'=>'UserController@edit');
Route::delete('/delete', 'UserController@destroy');

Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/edit', 'UserController@edit');//use with constructor
    Route::post('/store', 'UserController@store');
   #Route::get('/edit', ['middleware'=>'auth', 'uses'=>'UserController@edit']);
});
