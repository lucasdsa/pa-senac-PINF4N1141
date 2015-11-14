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

Route::get('/subscribe', function () {
   return View::make('forms.subscribe'); 
});

Route::get('/login', function () {
   return View::make('forms.login'); 
});

Route::post('/logout', 'SkilledOneController@logout');

Route::post('/subscribe', 'SkilledOneController@subscribe');
Route::post('/login', 'SkilledOneController@login');

Route::filter('csrf-ajax', function () {
    
    if (Session::token() != Request::header('x-csrf-token')) {
        
        throw new Illuminate\Session\TokenMismatchException;
    }
});