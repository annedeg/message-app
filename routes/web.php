<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['user_accessible']], function () {
    Route::get('/', 'HomeController@index');
    Route::post('/', 'HomeController@newMessage');
});
Route::get('/login', 'LoginController@index');
Route::post('/login', ['as' => 'login', 'uses'=>'LoginController@login']);
Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'RegisterController@index');
Route::post('/register','RegisterController@register');
