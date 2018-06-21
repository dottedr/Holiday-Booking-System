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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

//data for side menu
Route::get('/user','UserController@show');



//view team view for admin
Route::get('/team','UserController@index');
//view employee
Route::get('/team/{userid}','UserController@index');
//view new employee
Route::get('/newemployee','UserController@newView');

//list all employees, data
Route::get('/employees','EmployeeController@index');
//list employee, data
Route::get('team/employee/{userid}','EmployeeController@show');

//new employee
Route::post('newemployeerequest','EmployeeController@store');



//view all requests for admin
Route::get('/viewrequests', 'ManageRequestViewController@index');
//view single request TODO:finish
Route::get('/viewrequests/{hrequestid}', 'ManageRequestViewController@index');
//view new request
Route::get('/newrequest', 'NewRequestController@index')->name('newrequest');

//list requests, data
Route::get('/holidayrequests','HolidayRequestController@index');
//list requests for calendar, data
Route::get('holidayrequestscalendar','HolidayRequestController@indexCalendar');
//list request, data
Route::get('viewrequests/holidayrequest/{hrequestid}','HolidayRequestController@show');



//new request
Route::post('newholidayrequest','HolidayRequestController@store');
//TODO:update request
Route::post('updateholidayrequest','HolidayRequestController@update');


//public holidays data
Route::get('publicholidays','PublicHolidayController@index');
Route::get('publicholiday/{id}','PublicHolidayController@show');

//change password
Route::get('changepassword','UserController@indexPassword');
