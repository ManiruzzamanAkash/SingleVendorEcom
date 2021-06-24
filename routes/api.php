<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Cart Routes
// Route::group(['prefix' => 'carts'], function(){
//   Route::get('/', 'API\CartsController@index')->name('carts');
//   Route::get('/total', 'API\CartsController@total')->name('carts.total');
//   Route::get('/total-amounts', 'API\CartsController@totalAmounts')->name('carts.total_amounts');
//   Route::post('/store', 'API\CartsController@store')->name('carts.store');
//   Route::post('/update/{id}', 'API\CartsController@update')->name('carts.update');
//   Route::post('/quantity-update/{id}', 'API\CartsController@cartQuantityUpdate')->name('carts.quantity_update');
//   Route::post('/delete/{id}', 'API\CartsController@destroy')->name('carts.delete');
// });

// Cart Routes
Route::group(['prefix' => 'coupons'], function(){
  Route::post('/search', 'API\CouponsController@search')->name('coupons.search');
});

// Wishlist Routes
Route::group(['prefix' => 'wishlists'], function(){
  Route::get('/', 'API\WishlistsController@index')->name('wishlists');
  Route::get('/total', 'API\WishlistsController@total')->name('wishlists.total');
  Route::get('/total-amounts', 'API\WishlistsController@totalAmounts')->name('wishlists.total_amounts');
  Route::post('/store', 'API\WishlistsController@store')->name('wishlists.store');
  Route::get('/check/{product_id}/{api_token}', 'API\WishlistsController@check')->name('wishlists.check');
  Route::post('/delete/{id}', 'API\WishlistsController@destroy')->name('wishlists.delete');
});

// Review Routes
Route::group(['prefix' => 'review'], function(){
  Route::post('/store', 'API\ReviewController@store')->name('reviews.store');
});


// User Routes
Route::group(['prefix' => 'users'], function(){
Route::post('register', 'API\AuthenticationController@register')->name('api.users.register');
Route::get('email-check', 'API\AuthenticationController@checkEmail')->name('api.users.checkEmail');
Route::get('phone-check', 'API\AuthenticationController@checkPhone')->name('api.users.checkPhone');
});


// Search Products
Route::get('/products/search/{search}', 'API\ProductsController@search')->name('products.search');
Route::get('/categories/search/{search}', 'API\ProductsController@categorySearch')->name('api.categories.search');


Route::get('districts/{id}', function($id){
  return json_encode(App\Models\District::where('division_id', $id)->get());
});
Route::get('divisions', function(){
  return json_encode(App\Models\Division::get());
});
