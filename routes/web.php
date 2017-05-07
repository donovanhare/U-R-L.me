<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/new', 'ShortenerController@createLink');

Route::get('/all', 'ShortenerController@allLinks');

Route::group(['prefix' => 'l'], function() {

    Route::get('/{linkid}', 'ShortenerController@retrieveLink');//should call redirectLink
	Route::get('/{linkid}/information', 'ShortenerController@informationLink');

});