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
Route::get('/schedule', 'ScheduleController@show');
Route::post('/schedule', 'ScheduleController@store');
Route::get('/plan/artist', 'ByArtistController@show');
Route::get('/plan/time', 'ByTimeController@show');
Route::get('/', 'HomeController@show');