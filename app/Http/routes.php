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

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('home', function () {
//     echo 'welcome home';
// });



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//HomePage Routs...
Route::get('home', 'HomeController@index');
Route::post('home/index', 'HomeController@postNewsFeed');
Route::post('home/updatePost/{id}', 'HomeController@updatePost');
Route::get('home/deleteUserpost/{id}', 'HomeController@deletePost');

// add comment
Route::post('comment/add','CommentController@store');
// Route::get('home/index', 'HomeController@showComments');


// profile page
Route::get('profilePage', 'ProfilePageController@index');
Route::post('profilePage/postFeed', 'ProfilePageController@postNewsFeed');
// Route::post('profilePage/edit/{id}', 'ProfilePageController@updateUserProfile');
Route::post('profilePage/edit', 'ProfilePageController@updateUserProfile');


//photoMap
Route::get('photoMap', 'PhotoMapController@index');
Route::get('getMarkers', 'PhotoMapController@getMarkers');

Route::post('photoMap/add', 'PhotoUploderController@uploadUserImage');

//Admin Controll
Route::get('admin', 'AdminController@index');
Route::post('admin/addEvent', 'AdminController@addEvent');
Route::post('admin/updateEvent/{id}', 'AdminController@updateEvent');
Route::get('admin/deleteEvent/{deleteEventId}', 'AdminController@deleteEvent');
Route::get('admin/deletePost/{deletePostId}', 'AdminController@deletePost');
Route::get('admin/deleteUserImage/{deleteImageId}', 'AdminController@deleteUserImage');


//events Controller
Route::get('events', 'EventsController@index');



