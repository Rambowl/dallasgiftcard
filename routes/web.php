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
    return view('welcome');
});

//middleware will check to see if the user is logged in before continuing
Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/businesses', 'BusinessController@index');
	Route::post('/businesses', 'BusinessController@store');
	Route::get('/businesses/create', 'BusinessController@create');
	//Route::get('/businesses/{business}', 'BusinessController@show');
	Route::get('/businesses/{business}/edit', 'BusinessController@edit');
	Route::put('/businesses/{business}', 'BusinessController@update');

	Route::get('/campaigns', 'CampaignController@index');
	Route::post('/campaigns', 'CampaignController@store');
	Route::get('/campaigns/create', 'CampaignController@create');
	Route::get('/campaigns/{campaign}', 'CampaignController@show');
	Route::get('/campaigns/{campaign}/edit', 'CampaignController@edit');
	Route::put('/campaigns/{campaign}', 'CampaignController@update');
});

Auth::routes();
