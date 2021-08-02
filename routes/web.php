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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');



/*
Product Routes
All the routes for our product for frontend
*/
Route::group(['prefix' => 'products'], function () {

  Route::get('/', 'Frontend\ProductsController@index')->name('products');
  Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
  Route::get('/new/search', 'Frontend\PagesController@search')->name('search');

  //Category Routes
  Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
  Route::get('/category/{slug}', 'Frontend\CategoriesController@show')->name('categories.show');

  //Category Routes
  Route::get('/brands', 'Frontend\BrandsController@index')->name('brands.index');
  Route::get('/brand/{id}', 'Frontend\BrandsController@show')->name('brands.show');
});


// User Routes
Route::group(['prefix' => 'user'], function () {
  Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');
  Route::get('/dashboard', 'Frontend\UsersController@dashboard')->name('user.dashboard');
  Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
  Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');
  Route::get('/orders', 'Frontend\UsersController@orders')->name('user.orders');
  Route::get('/orders/order_detail/{id}', 'Frontend\UsersController@ordershow')->name('user.ordershow');
});


// Cart Routes
// Route::group(['prefix' => 'carts'], function(){
//   Route::get('/', 'Frontend\CartsController@index')->name('carts');
//   Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
//   Route::post('/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
//   Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');

//   Route::post('/buy/store', 'Frontend\CartsController@cartsBuy')->name('carts.buy');
// });

Route::get('/carts', 'Frontend\CartsController@index')->name('carts');

Route::group(['prefix' => 'api/carts'], function () {
  Route::get('/', 'API\CartsController@index')->name('api.carts');
  Route::get('/total', 'API\CartsController@total')->name('carts.total');
  Route::get('/total-amounts', 'API\CartsController@totalAmounts')->name('carts.total_amounts');
  Route::post('/store', 'API\CartsController@store')->name('carts.store');
  Route::post('/update/{id}', 'API\CartsController@update')->name('carts.update');
  Route::post('/quantity-update/{id}', 'API\CartsController@cartQuantityUpdate')->name('carts.quantity_update');
  Route::post('/delete/{id}', 'API\CartsController@destroy')->name('carts.delete');

  Route::post('/buy/store', 'Frontend\CartsController@cartsBuy')->name('carts.buy');
});


// Wishlist Routes
Route::group(['prefix' => 'wishlist'], function () {
  Route::get('/', 'Frontend\WishlistsController@index')->name('wishlists');
  Route::post('/store', 'Frontend\WishlistsController@store')->name('wishlists.store');
  Route::post('/update/{id}', 'Frontend\WishlistsController@update')->name('wishlists.update');
  Route::post('/delete/{id}', 'Frontend\WishlistsController@destroy')->name('wishlists.delete');
});

// Checkout Routes
Route::group(['prefix' => 'checkout'], function () {
  Route::get('/', 'Frontend\CheckoutsController@index')->name('checkouts');
  Route::post('/store', 'Frontend\CheckoutsController@store')->name('checkouts.store');
  Route::get('/success', 'Frontend\CheckoutsController@success')->name('checkouts.success');
});


// API Login Routes
Route::post('api/login', 'API\AuthenticationController@login')->name('api.login');



// Admin Routes
Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'Backend\PagesController@index')->name('admin.index');

  // Admin Login Routes
  Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');

  // Password Email Send
  Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

  // Password Reset
  Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');


  // Product Routes
  Route::group(['prefix' => '/products'], function () {
    Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
    Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
    Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');

    Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');

    Route::post('/product/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
    Route::post('/product/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');
  });


  // Orders Routes
  Route::group(['prefix' => '/orders'], function () {
    Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
    Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');
    Route::post('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');

    Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');

    Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');
    Route::post('/delivery/{id}', 'Backend\OrdersController@delivery')->name('admin.order.delivery');
    Route::post('/charge-update/{id}', 'Backend\OrdersController@chargeUpdate')->name('admin.order.charge');

    Route::get('/invoice/{id}', 'Backend\OrdersController@generateInvoice')->name('admin.order.invoice');
  });



  // Category Routes
  Route::group(['prefix' => '/categories'], function () {
    Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
    Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');
    Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');

    Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');

    Route::post('/category/edit/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
    Route::post('/category/delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');
  });

  // Brand Routes
  Route::group(['prefix' => '/brands'], function () {
    Route::get('/', 'Backend\BrandsController@index')->name('admin.brands');
    Route::get('/create', 'Backend\BrandsController@create')->name('admin.brand.create');
    Route::get('/edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');

    Route::post('/store', 'Backend\BrandsController@store')->name('admin.brand.store');

    Route::post('/brand/edit/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
    Route::post('/brand/delete/{id}', 'Backend\BrandsController@delete')->name('admin.brand.delete');
  });

  // Division Routes
  Route::group(['prefix' => '/divisions'], function () {
    Route::get('/', 'Backend\DivisionsController@index')->name('admin.divisions');
    Route::get('/create', 'Backend\DivisionsController@create')->name('admin.division.create');
    Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');

    Route::post('/store', 'Backend\DivisionsController@store')->name('admin.division.store');

    Route::post('/division/edit/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
    Route::post('/division/delete/{id}', 'Backend\DivisionsController@delete')->name('admin.division.delete');
  });

  // District Routes
  Route::group(['prefix' => '/districts'], function () {
    Route::get('/', 'Backend\DistrictsController@index')->name('admin.districts');
    Route::get('/create', 'Backend\DistrictsController@create')->name('admin.district.create');
    Route::get('/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.district.edit');

    Route::post('/store', 'Backend\DistrictsController@store')->name('admin.district.store');

    Route::post('/district/edit/{id}', 'Backend\DistrictsController@update')->name('admin.district.update');
    Route::post('/district/delete/{id}', 'Backend\DistrictsController@delete')->name('admin.district.delete');
  });


  // Slider Routes
  Route::group(['prefix' => '/sliders'], function () {
    Route::get('/', 'Backend\SlidersController@index')->name('admin.sliders');
    Route::post('/store', 'Backend\SlidersController@store')->name('admin.slider.store');
    Route::post('/slider/edit/{id}', 'Backend\SlidersController@update')->name('admin.slider.update');
    Route::post('/slider/delete/{id}', 'Backend\SlidersController@delete')->name('admin.slider.delete');
  });


  // Coupon Routes
  Route::group(['prefix' => '/coupons'], function () {
    Route::get('/', 'Backend\CouponsController@index')->name('admin.coupons');
    Route::get('/create', 'Backend\CouponsController@create')->name('admin.coupon.create');
    Route::get('/edit/{id}', 'Backend\CouponsController@edit')->name('admin.coupon.edit');
    Route::post('/store', 'Backend\CouponsController@store')->name('admin.coupon.store');
    Route::post('/coupon/edit/{id}', 'Backend\CouponsController@update')->name('admin.coupon.update');
    Route::post('/coupon/delete/{id}', 'Backend\CouponsController@delete')->name('admin.coupon.delete');
  });


  // Review Routes
  Route::group(['prefix' => '/reviews'], function () {
    Route::get('/', 'Backend\ReviewsController@index')->name('admin.reviews');
    Route::post('/approve/{id}', 'Backend\ReviewsController@approve')->name('admin.review.approve');
    Route::post('/delete/{id}', 'Backend\ReviewsController@delete')->name('admin.review.delete');
  });

  // Report Routes
  Route::group(['prefix' => '/reports'], function () {
    Route::get('/', 'Backend\ReportsController@index')->name('admin.reports');
    Route::get('/sell-report', 'Backend\ReportsController@sell_report')->name('admin.report.sell_report');
    Route::post('/sell-report/view', 'Backend\ReportsController@sell_report_search')->name('admin.report.sell_report.search');
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
