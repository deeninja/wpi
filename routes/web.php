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
use App\Comment;


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


    // comments
    Route::resource('admin/comments','CommentsController');

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


// show about page
Route::get('/about-us', 'PagesController@about');

// members
Route::get('/members','PagesController@members');

Route::get('/members/{id}', [ 'as'=> 'member.profile', 'uses'=> 'PagesController@member_view']);

// show blog page
Route::get('/blog', [ 'as'=> 'blog.index', 'uses'=> 'PagesController@blog']);

// show individual post
Route::get('/post/{id}', ['as' => 'post.show', 'uses' => 'PagesController@show_post'] );

// show blog category
Route::get('/blog/category/{id}', ['as' => 'posts.by.category', 'uses' => 'PagesController@posts_by_category'] );

// show contact page
Route::get('/contact','PagesController@contact');

// perform contact form processing
Route::post('/contact', 'PagesController@post_contact');

// show user profile
Route::get('/profile', ['as' => 'user.profile', 'uses' => 'PagesController@profile'] );

// show user profile
Route::get('/profile/edit/{id}', ['as' => 'user.profile.edit', 'uses' => 'PagesController@profile_edit'] );

// update user profile data
Route::patch('/profile/update/{id}', ['as' => 'user.profile.update', 'uses' => 'PagesController@profile_update'] );
