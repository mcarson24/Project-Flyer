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

Route::auth();

Route::get('/', 'PagesController@home')->name('home');
Route::get('about', 'PagesController@about')->name('about');
Route::get('redirect', 'HomeController@redirect');

Route::resource('flyers', 'FlyersController');

Route::get('{zip}/{street}', 'FlyersController@show');

Route::post('{zip}/{street}/photos', ['as' => 'store_photo_path', 'uses' => 'PhotosController@store']);

Route::get('/home', 'HomeController@index');
