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



/*----------------------------------------------------------------------------------------------
|
| cms routes (middleware to ensure only authorized+active users can access)
|
----------------------------------------------------------------------------------------------*/

/*
---------------------------------------------------------------------------*/

Route::group([ 'middleware' => 'admin' ], function() {

    // users home page
    Route::get('/home','HomeController@home');

    /* index
    ---------------------------------------------------------------------------*/
    Route::get('/admin', function() {

        return view('admin.index');

    });

    Route::get('/admin', 'HomeController@index');

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

    // show related plays
    Route::get('admin/conferences/{conference}/plays', [ 'as' => 'plays.conference.show', 'uses' => 'ConferencesController@show_plays' ]);

    Route::resource('admin/plays', 'PlaysController');

    Route::get('admin/plays/link/{play}', [ 'as' => 'play.link', 'uses' => 'PlaysController@link_play' ]);

    Route::post('admin/plays/link/', [ 'as' => 'play.dolink', 'uses' => 'PlaysController@do_link' ]);

    /* posts
    ---------------------------------------------------------------------------*/
    Route::resource('admin/posts', 'AdminPostsController');

    /* galleries
    ---------------------------------------------------------------------------*/

    // standard gallery crud
    Route::resource('admin/galleries', 'GalleriesController');

    // store gallery (without images)
    Route::post('admin/galleries/1', [ 'as' => 'galleries.store.name', 'uses' => 'GalleriesController@store_gallery' ]);

    // store gallery (without images)
    Route::post('admin/galleries/2', [ 'as' => 'galleries.store', 'uses' => 'GalleriesController@store' ]);

    // display link gallery to conference page
    Route::get('admin/galleries/link/{gallery}', [ 'as' => 'galleries.link', 'uses' => 'GalleriesController@link_gallery' ]);

    // perform gallery link to conference function
    Route::post('admin/galleries/link/', [ 'as' => 'galleries.dolink', 'uses' => 'GalleriesController@do_link' ]);

    // upload images (dropzone)
    Route::post('admin/gallery/do-image-upload', 'GalleriesController@doImageUpload');

    // remove individual images
    Route::get('admin/gallery/{id}/imageRemove', [ 'as' => 'galleries.imageRemove', 'uses' => 'GalleriesController@imageRemove' ]);

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
Route::get('/conference/{id}', [ 'as' => 'conference.show', 'uses' => 'PagesController@show_conference' ]);

// show conferences related plays
Route::get('/conference/{id}/play', [ 'as' => 'conference.plays.view', 'uses' => 'PagesController@show_conference_plays' ]);

// show individual conference related play
Route::get('/conference/play/{id}', [ 'as' => 'conference.play', 'uses' => 'PagesController@show_related_play' ]);

// show play listing
Route::get('plays',['as'=>'play.show','uses'=>'PagesController@plays']);

// show individual gallery
Route::get('/gallery/{id}', [ 'as' => 'gallery.view', 'uses' => 'PagesController@show_related_gallery' ]);

// show about page
Route::get('/about-us', 'PagesController@about');

// show members page
Route::get('/members', 'PagesController@members');

// view member
Route::get('/members/{id}', [ 'as' => 'member.profile', 'uses' => 'PagesController@member_view' ]);

// show galleries listing page
Route::get('/galleries', 'PagesController@galleries');

// show galleries listing page
Route::get('/galleries/{id}', [ 'as' => 'gallery.view', 'uses' => 'PagesController@show_gallery' ]);

// show blog page
Route::get('/blog', [ 'as' => 'blog.index', 'uses' => 'PagesController@blog' ]);

// show individual post
Route::get('/post/{id}', [ 'as' => 'post.show', 'uses' => 'PagesController@show_post' ]);

// show blog category
Route::get('/blog/category/{id}', [ 'as' => 'posts.by.category', 'uses' => 'PagesController@posts_by_category' ]);

// show contact page
Route::get('/contact', 'PagesController@contact');

// perform contact form processing
Route::post('/contact', 'PagesController@post_contact');

// show user profile
Route::get('/profile', [ 'as' => 'user.profile', 'uses' => 'PagesController@profile' ]);

// show user profile
Route::get('/profile/edit/{id}', [ 'as' => 'user.profile.edit', 'uses' => 'PagesController@profile_edit' ]);

// update user profile data
Route::patch('/profile/update/{id}', [ 'as' => 'user.profile.update', 'uses' => 'PagesController@profile_update' ]);

// comments
Route::resource('admin/comments', 'CommentsController');
