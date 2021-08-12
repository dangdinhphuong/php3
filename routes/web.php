<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|login_manage
 
*/


//middleware('login_manage')->
Route::middleware('login_manage')->name('admin.')->prefix('admin/', )->group(function () {
    Route::get('/', function () { return view('admin.layout');});
    Route::name('categories.')->prefix('categories/')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index')->middleware('can:Category_list');
        //Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store')->middleware('can:Category_add');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update', [CategoryController::class, 'update'])->name('update')->middleware('can:Category_edit');
        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });
    Route::name('products.')->prefix('products/')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index')->middleware('can:products_list');
        Route::get('create', [ProductController::class, 'create'])->name('create')->middleware('can:products_add');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit')->middleware('can:products_edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('delete')->middleware('can:products_delete');
    });
    Route::name('branches.')->prefix('branches/')->group(function () {
        Route::get('', [BranchController::class, 'index'])->name('index')->middleware('can:branch_list');
        Route::get('create', [BranchController::class, 'create'])->name('create')->middleware('can:branch_add');
        Route::post('store', [BranchController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BranchController::class, 'edit'])->name('edit')->middleware('can:branch_edit');
        Route::post('update', [BranchController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BranchController::class, 'destroy'])->name('delete')->middleware('can:branch_delete');
    });
    Route::prefix('permission')->group(function () {
        Route::get('index', 'PermissionController@index')->name('permission.index')->middleware('can:permission_list');
        Route::get('create', 'PermissionController@create')->name('permission.create')->middleware('can:permission_add');
        Route::get('edit/{id}', 'PermissionController@edit')->name('permission.edit')->middleware('can:permission_edit');
        Route::get('destroy/{id}', 'PermissionController@destroy')->name('permission.destroy')->middleware('can:permission_delete');
        Route::post('store', 'PermissionController@store')->name('permission.store');
        Route::post('update/{id}', 'PermissionController@update')->name('permission.update');
    });
    Route::prefix('role')->group(function () {
        Route::get('index', 'RoleController@index')->name('role.index')->middleware('can:role_list');
        Route::get('create', 'RoleController@create')->name('role.create')->middleware('can:role_add');
        Route::get('edit/{id}', 'RoleController@edit')->name('role.edit')->middleware('can:role_edit');
        Route::get('destroy/{id}', 'RoleController@destroy')->name('role.destroy')->middleware('can:role_delete');
        Route::post('store', 'RoleController@store')->name('role.store');
        Route::post('update/{id}', 'RoleController@update')->name('role.update');
    });
    Route::prefix('user')->group(function () {
        Route::get('index', 'UserController@index')->name('user.index')->middleware('can:user_list');
        Route::get('ajax', 'UserController@ajax')->name('user.ajax')->middleware('can:user_list');
        Route::get('create', 'UserController@create')->name('user.create')->middleware('can:user_add');
        Route::get('edit', 'UserController@edit')->name('user.edit')->middleware('can:user_edit');
        Route::get('destroy', 'UserController@destroy')->name('user.destroy')->middleware('can:user_delete');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::post('update/{id}', 'UserController@update')->name('user.update');
    });
    Route::prefix('slider')->group(function () {
        Route::get('index', 'SliderController@index')->name('slider.index')->middleware('can:slider_list');
        Route::get('create', 'SliderController@create')->name('slider.create')->middleware('can:slider_add');
        Route::get('edit/{id}', 'SliderController@edit')->name('slider.edit')->middleware('can:slider_edit');
        Route::get('destroy/{id}', 'SliderController@destroy')->name('slider.destroy')->middleware('can:slider_delete');
        Route::post('store', 'SliderController@store')->name('slider.store');
        Route::post('update/{id}', 'SliderController@update')->name('slider.update');
    });
    Route::prefix('order')->group(function () {
        Route::get('/', 'TrackorderController@index')->name('order.trackorder')->middleware('can:order_list');
        Route::post('order/update/{id}', 'TrackorderController@update')->name('order.update')->middleware('can:order_edit'); 
    });
});



 Route::get('/', 'frontend\HomeController@index')->name('/');
 Route::get('productdetail', 'frontend\ProductDetailController@index')->name('product_detail');
 Route::get('cateproduct', 'frontend\CateProductController@index')->name('cate_product');
 
 Route::middleware('login_manage')->group(function () {
 Route::post('add/product', 'frontend\CheckoutController@add_product')->name('addproduct'); 
 Route::post('delete', 'frontend\CheckoutController@delete')->name('delete'); 
 Route::get('checkout/cart', 'frontend\CheckoutController@index')->name('checkout'); 
 Route::post('order', 'frontend\OderController@create')->name('order'); 
 Route::get('order/history', 'TrackorderController@show')->name('trackorder');
 Route::get('order/view/{id}', 'TrackorderController@show_detail')->name('order.view');
 });



Route::prefix('auth')->group(function () {
    Route::get('login', 'Authentication@login_get')->name('auth.login');
    Route::get('logout', 'Authentication@login_out')->name('auth.logout');
    Route::get('forgot', 'Authentication@forgot')->name('auth.forgot');
    Route::get('new_pass', 'Authentication@new_password')->name('auth.new_pass');
    Route::post('strore_pass', 'Authentication@strore_password')->name('auth.strore_pass');
    Route::post('confirm', 'email\SendMailControllers@sendemail')->name('auth.confirm');
    Route::post('login_post', 'Authentication@login_post')->name('authentication.login_post');
    Route::post('login_post_model', 'Authentication@login_post_model')->name('authentication.login_post_model');
    Route::post('register', 'Authentication@register')->name('authentication.register');
});
// HtmlMinifier xóa bỏ khoảng trắng trong html giúp tăng tốc laravel
