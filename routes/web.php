<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentCon;
use App\Http\Controllers\CourseCon;
use App\Http\Controllers\PayCont;
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
    return view('auth.login');
});

//Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

######################################################## ####################################################
Route::resource('students', 'StudentCon')->middleware('auth');
####################### courses routes ########################
Route::resource('courses', 'CourseCon')->middleware('auth');
####################### payments routes ########################
Route::resource('payments', 'MunsarifatCon')->middleware('auth');
####################### company-payments routes ########################
Route::resource('company-payments', 'PayCont')->middleware('auth');
####################### jobs routes ########################
Route::resource('jobs', 'JobCon')->middleware('auth');
####################### employee routes ########################
Route::resource('employee', 'EmployeeCon')->middleware('auth');
######################################################## ####################################################
Route::get('/{page}', 'AdminController@index')->middleware('auth');
