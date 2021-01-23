<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    Route::get('/', 'AdminController@index')->name('index');
    Route::post('/login','AdminController@login')->name('admin.login');
    Route::get('/logout','AdminController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>'prevent'], function () {


    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('/users','AdminController@show_users')->name('show.users');

            //begin category routes
    Route::get('/category','AdminController@create_category')->name('create.category');
    Route::post('/save-category','CategoryController@store_category')->name('store.category');
    Route::get('/delete-category/{id}','CategoryController@delete_category')->name('delete.category');
    Route::get('/edit-category/{id}','CategoryController@edit_category')->name('edit.category');
    Route::post('/edit-category/{id}','CategoryController@update_category')->name('update.category');
    Route::get('/show-products/{id}','CategoryController@show_category_products')->name('products.category');

            //begin product routes
    Route::get('/product','AdminController@create_product')->name('create.product');
    Route::post('/product','ProductController@store_product')->name('store.product');
    Route::get('/products-list','ProductController@show_products')->name('products.list');
    Route::get('/delete-product/{id}','ProductController@delete_product')->name('delete.product');
    Route::post('/search-product','ProductController@search_product')->name('search.product');
    Route::get('/product-details/{id}','ProductController@show_product_details');


        //begin vindor routes
        Route::get('/show-vendors','VendorController@show_vendors')->name('show.vendors');
        Route::get('/show-vendor-products/{id}','VendorController@show_vendors_products')->name('show.vendors.products');
        Route::post('/add-products-vendor','VendorController@save_vendor_products')->name('save.vendor.products');
        Route::get('/vendor-phone','VendorController@vendor_phone');
    });

