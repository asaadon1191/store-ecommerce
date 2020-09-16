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

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function()
{
    Route::middleware('auth:admin')->namespace('Admin')->prefix('admin')->group(function()
    {
        Route::get('Dashboard','DashboardController@index')->name('Dashboard');
        Route::get('logout','LoginController@logout')->name('admin.logout');

    //  SETTINGS ROUTS
        Route::prefix('setting')->group(function()
        {
            Route::get('shipping-methods/{type}','settingsController@editMethod')->name('shipping.Methods');
            Route::put('shipping-methods/{id}','settingsController@updateMethod')->name('update.shipping.Methods');
        });

    //  PROFILE ROUTS
        Route::prefix('profile')->group(function()
        {
            Route::get('edit','ProfileController@getProfile')->name('edit.profile');
            Route::put('update','ProfileController@updateProfile')->name('update.profile');
            
        });

    //  CATEGORY ROUTS
        Route::prefix('category')->group(function()
        {
            Route::get('/','MainCategoriesController@index')->name('Categories');
            Route::get('/create','MainCategoriesController@create')->name('create.Categories');
            Route::post('/store','MainCategoriesController@store')->name('store.Categories');
            Route::get('edit/{id}','MainCategoriesController@edit')->name('edit.Categories');
            Route::put('update/{id}','MainCategoriesController@update')->name('update.Categories');
            Route::get('delete/{id}','MainCategoriesController@delete')->name('delete.Categories');
            
        });
//  SubCATEGORY ROUTS
        Route::prefix('SubCategory')->group(function()
        {
            Route::get('/','SubCategoryController@index')->name('SubCategory');
            Route::get('/create','SubCategoryController@create')->name('create.SubCategory');
            Route::post('/store','SubCategoryController@store')->name('store.SubCategory');
            Route::get('edit/{id}','SubCategoryController@edit')->name('edit.SubCategory');
            Route::put('update/{id}','SubCategoryController@update')->name('update.SubCategory');
            Route::get('delete/{id}','SubCategoryController@delete')->name('delete.SubCategory');
            
        });
    });

    // #####################################################################################################

    Route::namespace('Admin')->middleware('guest:admin')->prefix('admin')->group(function()
    {
        Route::get('/login','LoginController@loginForm')->name('admin.login'); 
        Route::post('/makelogin','LoginController@login')->name('admin.MakeLogin'); 
    });
});




