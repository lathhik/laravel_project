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

Route::get('/', 'AppController@home');

Route::get('/home', 'AppController@home')->name('home');

Route::get('/about', 'AppController@about')->name('about');

Route::get('/contact', 'AppController@contact')->name('contact');

