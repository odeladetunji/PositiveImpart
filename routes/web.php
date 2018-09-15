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

Route::get('/landingpage', 'LandingPageController@landingpage');
Route::get('/signuppage', 'signuppageController@signuppage');
Route::get('/loginpage', 'loginpageController@loginpage');
Route::get('/adminpage', 'adminpageController@adminpage');