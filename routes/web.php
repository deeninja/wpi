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
use App\Country;
use App\Photo;
use App\Gallery;


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


/*
---------------------------------------------------------------------------*/

Route::group([ 'middleware' => 'admin' ], function() {

    /* users
    ---------------------------------------------------------------------------*/
    Route::resource('admin/users', 'AdminUsersController');

    // view users route with alias
    Route::get('admin/users', [ 'as' => 'admin.users', 'uses' => 'AdminUsersController@index' ]);

    // create user route with alias
    Route::get('admin/users/create', [ 'as' => 'users.create', 'uses' => 'AdminUsersController@create' ]);


    /* conferences
    ---------------------------------------------------------------------------*/

    Route::resource('admin/conferences', 'ConferencesController');


    /* plays
    ---------------------------------------------------------------------------*/

    // show related plays (custom route)
    Route::get('admin/conferences/{conference}/plays',['as'=>'plays.conference.show','uses'=>'ConferencesController@show_plays']);

    Route::resource('admin/plays', 'PlaysController');


    /* posts
    ---------------------------------------------------------------------------*/
    Route::resource('admin/posts', 'AdminPostsController');


    /* galleries
    ---------------------------------------------------------------------------*/

    // standard gallery crud
    Route::resource('admin/galleries', 'GalleriesController');

    // store gallery (without images)
    Route::post('admin/galleries','GalleriesController@store_gallery');

    // display link gallery to conference page
    Route::get('admin/galleries/link/{gallery}', ['as'=>'galleries.link', 'uses'=>'GalleriesController@link_gallery']);

    // perform gallery link to conference function
    Route::post('admin/galleries/link/',['as' => 'galleries.dolink', 'uses'=>'GalleriesController@do_link']);

    // upload images (dropzone)
    Route::post('admin/gallery/do-image-upload','GalleriesController@doImageUpload');

    // remove individual images
    Route::get('admin/gallery/{id}/imageRemove',['as'=>'galleries.imageRemove', 'uses'=>'GalleriesController@imageRemove']);


    /* about
    ----------------------------------------------------------------------------------------------*/
    Route::resource('admin/about', 'AdminAboutSection');

});


/* constants
----------------------------------------------------------------------------------------------*/

// image directory
define('IMAGE_DIR', public_path() . '\\images\\');

// conference image directory
define('IMAGE_CONF', public_path() . 'IMAGE_DIR' . '\\conferences\\');

// plays image directory
define('IMAGE_PLAYS', public_path() . 'IMAGE_DIR' . '\\plays\\');

// users image directory
define('IMAGE_POSTS', public_path() . 'IMAGE_DIR' . '\\posts\\');

// users image directory
define('IMAGE_USERS', public_path() . 'IMAGE_DIR' . '\\users\\');

// gallery directory
define('GALLERY_IMAGE_DIR', public_path() . '\\gallery\images\\');



/*----------------------------------------------------------------------------------------------
|
| front-end
|
----------------------------------------------------------------------------------------------*/

// index
Route::get('/', 'PagesController@index');

//conferences
Route::get('/conferences', 'PagesController@conferences');

// show individual conference
Route::get('/conference/{id}', ['as' => 'conference.show', 'uses' => 'PagesController@show_conference'] );

// show conferences related plays
Route::get('/conference/{id}/play', ['as' => 'conference.plays.view', 'uses'=> 'PagesController@show_conference_plays']);

// show individual play
Route::get('/conference/play/{id}', ['as'=> 'conference.play', 'uses' => 'PagesController@show_related_play']);