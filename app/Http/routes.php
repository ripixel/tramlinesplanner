<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond ton
| and give it the controller to call when that URI is requested.
|
*/

/* Auth Routes */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/* App Routes */
Route::get('/compare/{share_str_1}/{share_str_2}', 'ScheduleController@compareShow');
Route::get('/compare', 'ScheduleController@compare');
Route::get('/schedule/{share_str}', 'ScheduleController@sharedShow');
Route::get('/schedule', 'ScheduleController@show');
Route::post('/schedule', 'ScheduleController@store');
Route::get('/plan/artist', 'ByArtistController@show');
Route::get('/plan/time', 'ByTimeController@show');
Route::get('/', 'HomeController@show');