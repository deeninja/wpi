<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\User;
Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('admin/users', 'AdminUsersController');

/* cms page display routes
----------------------------------------------------------------------------------------------*/

// cms
Route::get('/admin', function() {

    return view('admin.index');

});

// view users
Route::get('admin/users', ['as'=>'admin.users','uses'=>'AdminUsersController@index']);

// create user
Route::get('admin/users/create', ['as' => 'admin.users.create', 'uses'=>'AdminUsersController@create']);