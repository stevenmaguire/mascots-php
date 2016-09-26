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

Route::get('/', ['as' => 'home', 'uses' => 'SearchController@home']);
Route::get('results', ['as' => 'results', 'uses' => 'SearchController@results']);
Route::get('submit', ['as' => 'submit', 'uses' => 'SearchController@submit']);
Route::post('submit', ['as' => 'submit.process', 'uses' => 'SearchController@handleSubmit']);
