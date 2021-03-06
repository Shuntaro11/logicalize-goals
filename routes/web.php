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

Route::get('/', 'TopController@index')->name('top');

Auth::routes();

Route::get('/goals/{goal}/achieve', 'GoalController@achieve');
Route::get('/goals/achievedindex', 'GoalController@achievedindex');

Route::resource('goals', 'GoalController')->middleware('auth');