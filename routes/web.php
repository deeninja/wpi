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
use App\Conference;
use App\Play;


Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*----------------------------------------------------------------------------------------------
|
| cms routes (middleware to ensure only authorized+active users can access)
|
----------------------------------------------------------------------------------------------*/

/* index
---------------------------------------------------------------------------*/
Route::get('/admin', function() {

    return view('admin.index');

});


/* users
---------------------------------------------------------------------------*/

Route::group([ 'middleware' => 'admin' ], function() {

    Route::resource('admin/users', 'AdminUsersController');

});

// view users route with alias
Route::get('admin/users', [ 'as' => 'admin.users', 'uses' => 'AdminUsersController@index' ]);

// create user route with alias
Route::get('admin/users/create', [ 'as' => 'users.create', 'uses' => 'AdminUsersController@create' ]);

/* conferences
---------------------------------------------------------------------------*/
Route::resource('admin/conferences', 'ConferencesController');

// create test conferences
/*Route::get('/create/conferences', function() {

    $conferences = array(

    array(
        'photo_id' => '99999',
        'year' => '2013',
        'title' => 'Conference 2013 Title',
        'details' => 'The 2013 Conference Details. Core is the only anger, the only guarantee of acceptance. The sun knows. The honorable energy of relativity is to acquire with paradox.' ),

    array(
        'photo_id' => '99999',
        'year' => '2014',
        'title' => 'Conference 2014 Title',
        'details' => 'The 2014 Conference Details. Core is the only anger, the only guarantee of acceptance. The sun knows. The honorable energy of relativity is to acquire with paradox.' ),

    array(
        'photo_id' => '99999',
        'year' => '2015',
        'title' => 'Conference 2015 Title',
        'details' => 'The 2015 Conference Details. Core is the only anger, the only guarantee of acceptance. The sun knows. The honorable energy of relativity is to acquire with paradox.' )
    );


    foreach($conferences as $conference){

        $new_conference = Conference::create($conference);
        $new_conference->save();

    }


});*/


/* plays
---------------------------------------------------------------------------*/

// custom route / show related plays
Route::get('admin/conferences/{conference}/plays',['as'=>'plays.conference.show',
'uses'=>'ConferencesController@show_plays']);

Route::resource('admin/plays', 'PlaysController');