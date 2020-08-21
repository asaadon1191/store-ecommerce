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

// Note That The Prefix [admin] For All Routes In This File

Route::middleware('auth:admin')->namespace('Admin')->group(function()
{
     Route::get('Dashboard','DashboardController@index')->name('Dashboard');
});

Route::namespace('Admin')->middleware('guest:admin')->group(function()
{
   
    Route::get('/login','LoginController@loginForm')->name('admin.login'); 
    Route::post('/makelogin','LoginController@login')->name('admin.MakeLogin'); 
});


