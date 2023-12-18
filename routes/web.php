<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('UserView.home');
});

Route::get('/about', function () {
    return view('UserView.about');
});

Route::get('/contact', function () {
    return view('UserView.contact');
});

Route::get('/menu', function () {
    return view('UserView.menu');
});

Route::get('/ourteam', function () {
    return view('UserView.ourteam');
});

Route::get('/reservation', function () {
    return view('UserView.reservation');
});

Route::get('/service', function () {
    return view('UserView.service');
});
Route::get('/testimonial', function () {
    return view('UserView.testimonial');
});

Route::get('/login', function () {
    return view('UserView.login');
});

Route::get('/register', function () {
    return view('UserView.register');
});

Route::get('register/verify/{verify_key}', [App\Http\Controllers\Api\RegisterController::class, 'verify'])->name('verify');
Route::get('/login', [App\Http\Controllers\Api\LoginController::class, 'index'])->name('login');
Route::post('/actionLogin', [App\Http\Controllers\Api\LoginController::class, 'actionLogin'])->name('actionLogin');