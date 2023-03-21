<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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


Route::get('/welcome',[HomeController::class,'index'])->name('index');

Route::get('/admin',[AdminController::class,'index'])->name('index')->middleware('admin');


Route::get('/product/{product}',[HomeController::class,'show'])->name('shop.show');
Route::get('/welcome/filters',[HomeController::class,'filters'])->name('filters');;
Route::get('/welcome/search',[HomeController::class,'search'])->name('search');;


Route::group(['middleware' => ['auth']],function () {
    Route::get('/cart', [CartController::class, 'index'])->name('index');
    Route::get('/addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart/update/{id}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove-from-cart/delete/{id}', [CartController::class, 'remove'])->name('cart');
    Route::get('/product-add/{id}', [CartController::class, 'addToCart']);
    Route::post('/orders', [CartController::class, 'store'])->name("orders.store");
//    Route::post('/payment', [OrderController::class, 'index'])->name("orders.index");
                    // ACCOUNT
    Route::get('/welcome/profile/{user}',[AccountController::class,'index'])->name("shop.account");
    Route::get('/welcome/profile/edit/{user}',[AccountController::class,'edit'])->name("shop.edit");
    Route::post('/welcome/profile/update/{user}',[AccountController::class,'update'])->name("shop.update");
    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
                    // ORDERS
    Route::get('/orders/{order}',[OrderController::class,'show'])->name('orders.show');
});

Route::group(['middleware' => ['admin']],function (){
    Route::get('/admin/products',[ProductController::class,'index'])->name('products.index');
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/admin/products',[ProductController::class,'store'])->name('products.store');
    Route::delete('/products/delete/{product}',[ProductController::class,'destroy'])->name('products.destroy');
    Route::get('/products/edit/{product}',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/products/update/{product}',[ProductController::class,'update'])->name('products.update');
    Route::get('/products/show/{product}',[ProductController::class,'show'])->name('products.show');
    Route::get('/products/search',[ProductController::class,'search'])->name('products.search');
                            // USERS
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/edit/{user}',[UserController::class,'edit'])->name('users.edit');
    Route::post('/users/update/{user}',[UserController::class,'update'])->name('users.update');
    Route::delete('/users/delete/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::get('/users/search',[UserController::class,'search'])->name('users.search');
});
Route::post('/logout/back',[\App\Http\Controllers\Auth\LogoutController::class,'logout'])->name('logout')->middleware(['auth', 'auth.session']);


Auth::routes(['verify' => true]);

