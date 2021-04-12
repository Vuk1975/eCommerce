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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'FrontProductListController@index');
Route::get('/product/{id}', 'FrontProductListController@show')->name('product.view');
Route::get('/category/{name}','FrontProductListController@allProduct')->name('product.list');
Route::get('all/products', 'FrontProductListController@moreProduct')->name('more.product');

Route::get('/addToCart/{product}','CartController@addToCart')->name('add.cart');
Route::get('/cart', 'CartController@showCart')->name('cart.show');
Route::post('/products/{product}', 'CartController@updateCart')->name('cart.update');
Route::post('/product/{product}', 'CartController@removeCart')->name('cart.remove');
Route::get('/checkout/{amount}', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge', 'CartController@charge')->name('cart.charge');
Route::get('/orders', 'CartController@orders')->name('order')->middleware('auth');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('subcatories/{id}','ProductController@loadSubCategories');

Route::group(['prefix'=>'auth','middleware'=>['auth','is_admin']],function(){
	Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
	Route::resource('category','CategoryController');
	Route::resource('subcategory','SubCategoryController');
	Route::resource('product','ProductController');
	Route::get('slider', 'SliderController@index')->name('slider.index');
	Route::post('slider', 'SliderController@store')->name('slider.store');
	Route::get('slider/create', 'SliderController@create')->name('slider.create');
	Route::delete('slider/{id}', 'SliderController@destroy')->name('slider.destroy');
	Route::get('users', 'UserController@index')->name('user.index');
	//orders
	Route::get('/orders', 'CartController@userOrder')->name('order.index');
	Route::get('/orders/{user_id}/{order_id}', 'CartController@viewUserOrder')->name('user.order');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
