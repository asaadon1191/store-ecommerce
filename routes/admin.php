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
        
//  BRANDS ROUTS
        Route::prefix('Brand')->group(function()
        {
            Route::get('/','BrandsController@index')->name('brands');
            Route::get('/create','BrandsController@create')->name('create.brands');
            Route::post('/store','BrandsController@store')->name('store.brands');
            Route::get('edit/{id}','BrandsController@edit')->name('edit.brands');
            Route::put('update/{id}','BrandsController@update')->name('update.brands');
            Route::get('delete/{id}','BrandsController@delete')->name('delete.brands');
        });
    

//  TAGS ROUTS
        Route::prefix('Tag')->group(function()
        {
            Route::get('/','TagsController@index')->name('tags');
            Route::get('/create','TagsController@create')->name('create.tags');
            Route::post('/store','TagsController@store')->name('store.tags');
            Route::get('edit/{id}','TagsController@edit')->name('edit.tags');
            Route::put('update/{id}','TagsController@update')->name('update.tags');
            Route::get('delete/{id}','TagsController@delete')->name('delete.tags');
        });

//  PRODUCTS ROUTS
        Route::prefix('Product')->group(function()
        {
            Route::get('/','ProductsController@index')->name('products');
            Route::get('/create','ProductsController@create')->name('create.products');
            Route::post('/store','ProductsController@store')->name('store.products');

            Route::post('/store_prices','ProductsController@store_prices')->name('store_prices.products');
            Route::post('/store_inv','ProductsController@store_inv')->name('store_inv.products');
            Route::post('/store_image/{id}','ProductsController@store_image')->name('store_image.products');
            
            Route::get('edit/{id}','ProductsController@edit')->name('edit.products');
            Route::put('update/{id}','ProductsController@update')->name('update.products');
            Route::get('delete/{id}','ProductsController@delete')->name('delete.products');
        });

//  ATTRIBUTES ROUTS
        Route::prefix('Attribute')->group(function()
        {
            Route::get('/','AttributeController@index')->name('attributes');
            Route::get('/create','AttributeController@create')->name('create.attributeds');
            Route::post('/store','AttributeController@store')->name('store.attributeds');
            Route::get('edit/{id}','AttributeController@edit')->name('edit.attributes');
            Route::put('update/{id}','AttributeController@update')->name('update.attributes');
            Route::get('delete/{id}','AttributeController@delete')->name('delete.attributes');
        });
    });

    // #####################################################################################################

    Route::namespace('Admin')->middleware('guest:admin')->prefix('admin')->group(function()
    {
        Route::get('/login','LoginController@loginForm')->name('admin.login'); 
        Route::post('/makelogin','LoginController@login')->name('admin.MakeLogin'); 
    });
});




