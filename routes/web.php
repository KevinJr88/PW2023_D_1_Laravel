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