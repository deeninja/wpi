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

/* admin / backend routes (middleware to ensure only authorized+active users can access)
----------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>'admin'], function() {

    Route::resource('admin/users', 'AdminUsersController');


});

/* cms page display routes
----------------------------------------------------------------------------------------------*/
// cms
Route::get('/admin', function() {

    return view('admin.index');

});

// view users route with alias
Route::get('admin/users', ['as'=>'admin.users','uses'=>'AdminUsersController@index']);

// create user route with alias
Route::get('admin/users/create', ['as' => 'users.create', 'uses'=>'AdminUsersController@create']);
