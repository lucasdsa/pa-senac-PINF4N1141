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

Route::get('/', 'NavigationController@handleSession');
Route::get('/subscribe', 'FormsController@subscribeForm');
Route::get('/login', 'FormsController@loginForm');
Route::get('/listNext', 'FormsController@getUsersNext');
Route::get('/listPrev', 'FormsController@getUsersPrev');


Route::post('/logout', 'SkilledOneController@logout');
Route::post('/subscribe', 'SkilledOneController@subscribe');
Route::post('/login', 'SkilledOneController@login');