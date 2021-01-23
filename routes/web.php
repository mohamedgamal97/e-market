<?php

use App\Http\Controllers\FrontEnd\SiteController;
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

Route::group(['namespace' => 'FrontEnd'], function () {
    Route::get('/','SiteController@index');
    Route::post('/All-products','SiteController@show_products')->name('show.all.prodcuts');
});
