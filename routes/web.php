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

//data for side menu
Route::get('/user','UserController@show');



//view team view  auth:admin
Route::get('/team','EmployeeController@indexView');
//view employee  auth:admin
Route::get('/team/{userid}','EmployeeController@indexView');
//view new employee auth:admin
Route::get('/newemployee','EmployeeController@newView');

//list all employees, data auth:admin
Route::get('/employees','EmployeeController@index');
//list employee, data auth:admin
Route::get('team/employee/{userid}','EmployeeController@show');

//new employee auth:admin
Route::post('newemployeerequest','EmployeeController@store');



//view all requests for admin auth:admin
Route::get('/viewrequests', 'ManageRequestViewController@index');
//view single request  auth:admin
Route::get('/viewrequests/{hrequestid}', 'ManageRequestViewController@index');

//view new request
Route::get('/newrequest', 'NewRequestController@index')->name('newrequest');

//list requests, data
Route::get('/holidayrequests','HolidayRequestController@index');
//list requests for calendar, data
Route::get('holidayrequestscalendar','HolidayRequestController@indexCalendar');
//TODO: listing request, data
Route::get('viewrequests/holidayrequest/{hrequestid}','HolidayRequestController@show');


//view my requests
Route::get('/myrequests', 'ManageRequestViewController@indexMyRequests');
//list my requests
Route::get('/myholidayrequests','HolidayRequestController@indexMyRequests');


//new request
Route::post('newholidayrequest','HolidayRequestController@store');
//update request
Route::post('updateholidayrequest','HolidayRequestController@update');


//public holidays data
Route::get('publicholidays','PublicHolidayController@index');
Route::get('publicholiday/{id}','PublicHolidayController@show');

//change password
Route::get('changepassword','UserController@showPasswordForm');
Route::post('/changePassworda','UserController@changePassword')->name('changePassworda');

//registration
Route::get('/user/verify/{token}', 'UserController@verifyUser');
