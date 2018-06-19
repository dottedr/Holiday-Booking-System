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
//admin data for side menu



//show team view for admin
Route::get('/team','UserController@index');
Route::get('/team/{userid}','UserController@index');

//show team member view
//Route::get('/team/member', 'EmployeeController@view')->name('team.member');

//list employee TODO:how to get employee by id
Route::get('/employee/{id}','EmployeeController@show');
//list all employees, mock in user view
Route::get('/employees','EmployeeController@index');



Route::get('publicholidays','PublicHolidayController@index');
Route::get('publicholiday/{id}','PublicHolidayController@show');

Route::get('holidayrequests','HolidayRequestController@index');
Route::get('holidayrequest/{id}','HolidayRequestController@show');
Route::post('newholidayrequest','HolidayRequestController@store');