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
Route::get('/signuppage', 'SignuppageController@signuppage');
Route::get('/loginpage', 'LoginpageController@loginpage');
Route::get('/adminpage', 'AdminpageController@adminpage');
Route::get('/LoadCourses', 'LoadCoursesController@LoadCourses');
Route::get('/passwordRecovery', 'PasswordRecoveryController@recovery');

//post routes!!!!
Route::post('/login', 'StudentPageController@student');
Route::post('/addACourse', 'AddACourseController@addACourse');
Route::post('/getRegisteredCourses', 'GetRegisteredCoursesController@getTheCoursesRegistered');
Route::post('/LogStudentIn', 'LogStudentInController@logStudentIn');
Route::post('/SignUpStudent', 'SignUpStudentController@signup');
Route::post('/gotoStudentPage', 'TheStudentPageController@theStudent');