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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Ecommerce')->group(function () {
    Route::resource('product', 'ProductController', [
        'as' => 'ecommerce'
    ]);
    Route::resource('category', 'CategoryController', [
        'as' => 'ecommerce'
    ]);
    Route::post('category/viewmode', [
        'as' => 'ecommerce.category.viewmode',
        'uses' => 'CategoryController@changeViewMode',
    ]);
    Route::post('category/showby', [
        'as' => 'ecommerce.category.showby',
        'uses' => 'CategoryController@showBy',
    ]);
    Route::post('category/sortby', [
        'as' => 'ecommerce.category.sortby',
        'uses' => 'CategoryController@sortBy',
    ]);
});
