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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/campaigns', 'CampaignController@index');
Route::post('/campaigns', 'CampaignController@store');
Route::get('/campaigns/create', 'CampaignController@create');
Route::get('/campaigns/{campaign}', 'CampaignController@show');
Route::get('/campaigns/{campaign}/edit', 'CampaignController@edit');
Route::put('/campaigns/{campaign}', 'CampaignController@update');
