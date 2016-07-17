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
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

//testing pusher

class TestEvent implements ShouldBroadcast
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}

Route::get('/broadcast', function() {
    event(new TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});

Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
        'test-event',
        array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});

Route::controller('notifications', 'NotificationController');

//these pages can be accessed by guests
Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/', function () {
        return view('auth.login');
    });

    
    //these pages are accessible only to authenticated users
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/home', 'HomeController@index');
        Route::get('/edit', 'UserController@edit');
        Route::post('/store', 'UserController@store');
        Route::get('help', 'HomeController@help');
        Route::get('calendar', 'HomeController@calendar');
        Route::get('contract_info', 'ContractController@contract_info');
        Route::get('/contract/{id}', 'ContractController@showContract');
        Route::get('/full_profile/{id}', 'ContractController@full_profile');
        Route::post('/update_contract', 'ContractController@store');
        Route::get('/add_new', 'UserController@add_new_form');
        Route::get('delete_user/{id}', 'UserController@delete');
        Route::get('/staff_view', 'UserController@staff_view');
        Route::post('/store_new_user', 'UserController@store_new_user');
        Route::post('/store_edited_user/{id}', 'UserController@store_edited_user');
        Route::get('/edit_user/{id}', 'UserController@edit_user');
        Route::get('/edit_profile', 'UserController@edit_profile');
        Route::get('my_profile', 'UserController@my_profile');
        Route::get('contract_received/{id}', 'ContractController@contract_received');
        Route::get('contract_not_received/{id}', 'ContractController@contract_not_received');
        Route::get('contract_submitted/{id}','ContractController@contract_submitted');
        Route::post('update_profile/{id}','UserController@store');
        Route::get('remind_user/{id}','ContractController@remind_user');
        Route::get('/expiring_contract_dialog/{id}', 'ContractController@expiring_contract_dialog');
        Route::resource('photo/store', 'PhotoController@store');


        //these pages can only be accessed by the HOD
        Route::group(['middleware' => 'userAccess'], function () {


        });

    });

});
