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
Route::get('/newrequest', 'NewRequestController@index')->name('newrequest');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

//data for side menu
Route::get('/user','UserController@show');
//TODO: admin data for side menu



//view team view for admin
Route::get('/team','UserController@index');
//view employee
Route::get('/team/{userid}','UserController@index');

//list all employees, data
Route::get('/employees','EmployeeController@index');
//list employee, data
Route::get('team/employee/{userid}','EmployeeController@show');




//view all requests for admin
Route::get('/viewrequests', 'ManageRequestViewController@index');
//view single request
Route::get('/viewrequests/{hrequestid}', 'ManageRequestViewController@index');

//list requests, data
Route::get('/holidayrequests','HolidayRequestController@index');
//list requests for calendar, data
Route::get('holidayrequestscalendar','HolidayRequestController@indexCalendar');
//list request, data
Route::get('viewrequests/holidayrequest/{hrequestid}','HolidayRequestController@show');

//view new requests
Route::get('/viewrequests', 'ManageRequestViewController@index');
//view single request
Route::get('/viewrequests/{hrequestid}', 'ManageRequestViewController@index');


//new request
Route::post('newholidayrequest','HolidayRequestController@store');

//public holidays data
Route::get('publicholidays','PublicHolidayController@index');
Route::get('publicholiday/{id}','PublicHolidayController@show');

//change password
Route::get('changepassword','UserController@indexPassword');
