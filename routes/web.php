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

Route::get('/', 'App\Http\Controllers\HolidaysController@index');
Route::get('/search', 'App\Http\Controllers\HolidaysController@search');

Route::post('/','App\Http\Controllers\HolidaysController@store');
Route::get('/{holiday}/edit', 'App\Http\Controllers\HolidaysController@edit');
Route::patch('/update/{holiday}', 'App\Http\Controllers\HolidaysController@update');
Route::delete('/{holiday}/delete', 'App\Http\Controllers\HolidaysController@destroy');