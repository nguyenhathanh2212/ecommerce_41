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
    Route::post('product/showreview', [
        'as' => 'ecommerce.product.showreview',
        'uses' => 'ProductController@showReview', 
    ]);
    Route::post('product/addreview', [
        'as' => 'ecommerce.product.addreview',
        'uses' => 'ProductController@addReview', 
    ]);
    Route::post('product/addcomment', [
        'as' => 'ecommerce.comment.addcomment',
        'uses' => 'CommentController@addComment', 
    ]);
    Route::post('product/addsubcomment', [
        'as' => 'ecommerce.comment.addsubcomment',
        'uses' => 'CommentController@addSubComment', 
    ]);
    Route::post('product/showcomment', [
        'as' => 'ecommerce.comment.showcomment',
        'uses' => 'CommentController@showComment', 
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
    Route::post('addcart', [
        'as' => 'ecommerce.cart.addcart',
        'uses' => 'CartController@addCart',
    ]);
    Route::get('cart', [
        'as' => 'ecommerce.cart.index',
        'uses' => 'CartController@index',
    ]);
    Route::post('cart/delete', [
        'as' => 'ecommerce.cart.delete',
        'uses' => 'CartController@delete',
    ]);
    Route::post('cart/changequanlity', [
        'as' => 'ecommerce.cart.changequanlity',
        'uses' => 'CartController@changeQuanlity',
    ]);
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::resource('product', 'ProductController', [
        'as' => 'admin',
    ]);
    Route::post('product/search',[
        'as' => 'admin.product.search',
        'uses' => 'ProductController@search',
    ]);
    Route::post('product/paginate',[
        'as' => 'admin.product.paginate',
        'uses' => 'ProductController@paginate',
    ]);
    Route::post('product/subcategory',[
        'as' => 'admin.product.subcategory',
        'uses' => 'ProductController@getSubCategories',
    ]);
    Route::post('product/delete',[
        'as' => 'admin.product.delete',
        'uses' => 'ProductController@delete',
    ]);
});
