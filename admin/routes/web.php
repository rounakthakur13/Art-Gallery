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

Route::get('/', function () {
    return view('auth/login');

});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::resource('categories','CategoryController');
Route::resource('users','UserController');
ROute::resource('products','ProductController');

Route::resource('feedbacks','FeedbackController');
Route::post('/feedbacks/send','FeedbackController@send');
Route::get('finished','FinishedController@index')->name('finished');
Route::get('data','DataController@index');
Route::get('showTable','DataController@show')->name('showTable');