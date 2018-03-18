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
Route::get('/auth/{provider}', [
    'uses' => 'SocialAuthController@redirectToProvider',
    'as' => 'social',
]);
Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');

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
    Route::prefix('checkout')->middleware('auth')->group(function () {
        Route::get('/', [
            'as' => 'ecommerce.checkout.index',
            'uses' => 'CheckoutController@index',
        ]);
        Route::post('/', [
            'as' => 'ecommerce.checkout.order',
            'uses' => 'CheckoutController@order',
        ]);
        Route::get('confirm', [
            'as' => 'ecommerce.checkout.confirm',
            'uses' => 'CheckoutController@confirm',
        ]);
    });
    Route::prefix('profile')->middleware('auth')->group(function () {
        Route::get('/', [
            'as' => 'ecommerce.profile.index',
            'uses' => 'ProfileController@index',
        ]);
        Route::get('order', [
            'as' => 'ecommerce.profile.order',
            'uses' => 'ProfileController@showOrder',
        ]);
        Route::get('order/detail/{id}', [
            'as' => 'ecommerce.profile.orderdetail',
            'uses' => 'ProfileController@showOrderDetail',
        ]);
    });
    Route::post('search', [
        'as' => 'ecommerce.search',
        'uses' => 'ProductController@search',
    ]);
});

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
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
    Route::get('importfile',[
        'as' => 'admin.product.importfile',
        'uses' => 'ProductController@createImportFile',
    ]);
    Route::post('importfile',[
        'as' => 'admin.product.importfile',
        'uses' => 'ProductController@importFile',
    ]);
    Route::resource('user', 'UserController', [
        'as' => 'admin',
    ]);
    Route::post('user/paginate',[
        'as' => 'admin.user.paginate',
        'uses' => 'UserController@paginate',
    ]);
    Route::post('user/setadmin',[
        'as' => 'admin.user.setadmin',
        'uses' => 'UserController@setAdmin',
    ]);
    Route::get('', [
        'uses' => 'UserController@index',
        'as' => 'home.admin',
    ]);
    Route::resource('order', 'OrderController', [
        'as' => 'admin',
    ]);
    Route::post('showbystatus', [
        'as' => 'admin.order.showbystatus',
        'uses' => 'OrderController@showByStatus',
    ]);
    Route::get('changestatus/{id}', [
        'as' => 'admin.order.changestatus',
        'uses' => 'OrderController@changeStatus',
    ]);
});
