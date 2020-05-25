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

/* Route::get('/', function () {
    return view('index');
}); */

/* Route::get('/cart/{id}', 'ProductController@addToCart');

Route::get('/cart', 'ProductController@cart');

Route::get('/product-details/{id}', 'ProductController@index');

Route::patch('/update-from-cart', 'ProductController@update');
 
Route::delete('/remove-from-cart', 'ProductController@remove');

Route::get('/checkout', function(){
    return view('customer.checkout');
});

Route::get('/confirm-order', function(){
    return view('customer.thankyou');
}); */

Route::get('/', 'HomeController@index')->name('index');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/shop/category/{slug}', 'ShopController@index')->name('shop.category');

// contoh
// show product
// Route::get('/product/{product}', 'ProductController@show')->name('product.show');

// show all product by categories
// Route::get('/category/{slug}', 'CategoryController@show')->name('category.show')
Route::get('/home', 'HomeController@index')->name('home')->middleware('user');

Route::get('/cart', 'CartController@cart');
Route::post('/add-to-cart/{id}', 'CartController@addToCart');

Route::patch('/update-from-cart', 'CartController@update');
Route::delete('/remove-from-cart', 'CartController@remove');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::view('/thank-you', 'thank-you');

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::get('/myprofile', 'ProfileController@getProfileView');
    Route::post('/profile-update', 'ProfileController@postProfile');

    Route::get('/orders', 'OrderController@index');

    Route::get('/dashboard', function ()
    {
        return view('admin.dashboard');
    });

    Route::get('/userslist', 'Admin\DashboardController@signedup');
    Route::get('/users-edit/{id}', 'Admin\DashboardController@signedup_edit');
    Route::put('/users-signedup-update/{id}', 'Admin\DashboardController@signedup_update');
    Route::delete('/users-delete/{id}', 'Admin\DashboardController@signedup_delete');

    
    
    //Categories routes (Admin)
    Route::get('/categories-list', 'Admin\CategoryController@viewCategory');
    Route::post('/categories-added', 'Admin\CategoryController@addCategory');
    Route::delete('/categories-delete/{id}', 'Admin\CategoryController@deleteCategory');

    //Products routes (Admin)
    Route::get('/products-list', 'Admin\ProductController@viewProduct');
    Route::post('/products-added', 'Admin\ProductController@addProduct');
    Route::delete('/product-delete/{id}', 'Admin\ProductController@removeProduct');

    //Order routes (Admin)
    Route::get('/orders-list', 'Admin\DashboardController@viewOrder');
    Route::get('/orders-edit/{id}', 'Admin\DashboardController@editOrder');
    Route::delete('/orders-delete/{id}', 'Admin\DashboardController@removeOrder');
});

Route::get('/logout', 'AdminController@logout');