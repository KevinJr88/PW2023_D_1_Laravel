<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\HomeController;
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



Route::Resource('/', HomeController::class);

// Route::get('/home', function () {
//     return view('UserView.home');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/about', function () {
    return view('UserView.about');
});

Route::get('/contact', function () {
    return view('UserView.contact');
});


Route::get('/ourteam', function () {
    return view('UserView.ourteam');
});

Route::get('/reservation', function () {
    return view('UserView.reservation');
});
Route::post('/reservation', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');

Route::get('/service', function () {
    return view('UserView.service');
    
});

Route::get('/cart', function () {
    return view('UserView.cart');
});
Route::get('/testimonial', function () {
    return view('UserView.testimonial');
});


// Route::get('/register', function () {
//     return view('UserView.register');
// });

Route::get('register/verify/{verify_key}', [App\Http\Controllers\Api\RegisterController::class, 'verify'])->name('verify');
// Route::get('/login', [App\Http\Controllers\Api\LoginController::class, 'index'])->name('login');
Route::get('register', [App\Http\Controllers\Api\RegisterController::class,'register'])->name('register');
Route::post('register/action', [App\Http\Controllers\Api\RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::post('/actionLogin', [App\Http\Controllers\Api\LoginController::class, 'actionLogin'])->name('actionLogin');
Route::Resource('/login', App\Http\Controllers\Api\LoginController::class);
// Route::Resource('/register', App\Http\Controllers\Api\RegisterController::class);
//Route::get('/register', [App\Http\Controllers\Api\RegisterController::class, 'index'])->name('register');;
Route::get('logout', [App\Http\Controllers\Api\LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');


Route::post('/createOrder', [App\Http\Controllers\OrderController::class, 'store'])->name('createOrder');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('orderDetail');
Route::Resource('/menu', MenuController::class);

Route::post('/updateQuantity', [App\Http\Controllers\CartsController::class, 'updateQuantity'])->name('updateQuantity');
Route::middleware(['auth'])->group(function () {
    
    Route::Resource('/profile', App\Http\Controllers\ProfileController::class);
    Route::get('/cart', [App\Http\Controllers\Api\CartController::class, 'index']);
    Route::post('/cart/{id}', [App\Http\Controllers\Api\CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [App\Http\Controllers\Api\CartController::class, 'destroy'])->name('cart.destroy');
    //Route::get('/cart', [App\Http\Controllers\Api\CartController::class, 'index'])->name('cart');
});
Route::middleware(['auth', 'admin'])->group(function (){
    Route::resource('/admin/menu', App\Http\Controllers\MenuAdminController::class);
    Route::resource('/admin/order', OrderAdminController::class);
    Route::Resource('/admin/reservation', App\Http\Controllers\ReservationAdminController::class);
    Route::resource('/admin/customer', CustomerController::class);
    Route::get('/admin', function () {
        return view('admin/mainManagement');
    });
});