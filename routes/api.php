<?php

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('messages/{id}', 'MessageController@get');
Route::get('messages', 'MessageController@getAll');
Route::post('messages', 'MessageController@create');
Route::put('messages/{id}', 'MessageController@update');
Route::delete('messages/{id}', 'MessageController@delete');


