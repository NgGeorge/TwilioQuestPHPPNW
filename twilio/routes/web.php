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

Route::get('/send', 'SendController@send');

Route::get('/send-person', 'SendController@sendPerson');

Route::get('/send-copilot', 'SendController@sendCopilot');

Route::get('/send20', 'SendController@send20');

Route::get('/deleteRecent', 'MessageController@deleteMostRecentMessage');

Route::get('/dashboard', 'DashboardController@home');
