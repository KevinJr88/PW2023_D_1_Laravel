<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuAdminController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationAdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/login', [App\Http\Controllers\Api\LoginController::class, 'index'])->name('login');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('/actionLogin', [App\Http\Controllers\Api\LoginController::class, 'actionLogin'])->name('actionLogin');

//Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::get('register', [App\Http\Controllers\Api\RegisterController::class,'register'])->name('register');
Route::post('register/action', [App\Http\Controllers\Api\RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [App\Http\Controllers\Api\RegisterController::class, 'verify'])->name('verify');

// Route::post('/admin/menu', [MenuAdminController::class, 'store']);
// Route::get('/admin/menu', [MenuAdminController::class, 'index']);
Route::Resource('/admin/menu', MenuAdminController::class);
Route::Resource('/admin/order', OrderAdminController::class);
Route::Resource('/admin/customer', CustomerController::class);
Route::Resource('/admin/reservation', ReservationAdminController::class);
Route::delete('/admin/menu/{id}', [MenuAdminController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});