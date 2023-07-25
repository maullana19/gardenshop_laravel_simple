<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MustLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ============= ADMIN ROUTE =============================
Route::get('admin', [AdminController::class, 'index']);

// ============== USER ROUTE =============================
Route::get('profile_user/{id}', [AuthController::class, 'showProfile'])->name('profile_user');

// =============== ABOUT =================================
Route::get('/about', function () {
  return view('about');
});

// ============= HOME PRODUCT ============================
Route::get('/', [ProductController::class, 'showProduct']);
Route::get('/detail_product/{id}', [ProductController::class, 'detailProduct'])->name('detailProduct');
Route::post('home', [ProductController::class, 'searchingProduct'])->name('searchingProduct');
Route::get('home/{id}', [ProductController::class, 'addToCart'])->name('addToCart')->middleware(MustLogin::class);
Route::get('cart', [ProductController::class, 'showCart'])->name('showCart');
Route::delete('deleteFromCart/{id}', [ProductController::class, 'deleteFromCart'])->name('deleteFromCart');

// ============== ORDERS =================================
Route::get('orders', [OrderController::class, 'showOrderPage']);
Route::post('orders', [OrderController::class, 'checkoutTransfer'])->name('checkoutTransfer');



// ============ AUTHENTICATED ============================ 
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('login', [AuthController::class, 'login_credentials'])->name('login_credentials');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('register', [AuthController::class, 'register_credentials'])->name('register_credentials');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
