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

//these pages can be accessed by anyone
Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::get('/', function () {
        return view('welcome');
    });




#Route::get('/edit', ['middleware'=>'auth' 'uses'=>'UserController@edit');


    Route::group(['middleware' => 'auth'], function () {

         Route::get('/home', 'HomeController@index');
         Route::get('/edit', 'UserController@edit');//use with constructor
        Route::post('/store', 'UserController@store');

    //these pages can only be accessed by the HOD
    Route::group(['middleware' => 'userAccess'], function() {

        Route::get('/contract/{id}', 'ContractController@showContract');
        Route::get('/staff', 'Staff@viewStaff');
        Route::post('/updateContract', 'ContractController@store');
        Route::delete('/delete', 'UserController@destroy');
        Route::get('/staff_view', 'UserController@staff_view');
        Route::get('/register', 'UserController@register');
    });

});

});
