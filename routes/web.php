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

/**
 * User Registration Routes
 */
Route::get('/', function () {
    return view('welcome');
});
Route::resource('/user','App\Http\Controllers\User\RegisteredUserController');

/**
 * Admin Routes
 */
Route::resource('/admin','App\Http\Controllers\Admin\AdminController');
Route::get('/userlist','App\Http\Controllers\Admin\AdminController@userList');
Route::get('/logout','App\Http\Controllers\Admin\AdminController@logout');