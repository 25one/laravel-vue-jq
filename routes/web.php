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

Route::get('/', function(){
    return redirect(route('login'));
});

Auth::routes();

Route::middleware('auth')->group(function () {
	Route::name('home')->get('/home', 'ProductController@index');
	Route::name('product')->get('/product/{id}', 'ProductController@product');
	//Route::name('cart')->get('/cart', 'ProductController@cart')->middleware('auth');
	Route::name('cart')->get('/cart', 'ProductController@cart');
	Route::name('tocart')->post('/tocart', 'ProductController@tocart');
	Route::name('clearall')->post('/clearall', 'ProductController@clearall');
	Route::name('removeone')->post('/removeone', 'ProductController@removeone');
	Route::name('mailer')->post('/mailer', 'ProductController@mailer');
	Route::name('cartUserCount')->get('/cartUserCount', 'ProductController@cartUserCount');
});

Route::middleware('admin')->group(function () {
	Route::name('dashboard-users')->get('/dashboard-users', 'AdminController@dashboardUsers');
	Route::name('dashboard-products')->get('/dashboard-products', 'AdminController@dashboardProducts');
    Route::resource('products', 'AdminController');
});

