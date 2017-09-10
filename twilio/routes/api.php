<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| * Prefix removed, the API routes here can be called at their paths without /API prefix
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sms', 'ReplyController@reminder2');

Route::post('/sms-reply', 'ReplyController@reply');

Route::post('/sms-reply-original', 'ReplyController@replyOriginal');

Route::post('/status', 'ReplyController@statusCheck');
