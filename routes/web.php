<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuAdminController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\CustomerController;
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

Route::get('/cart', function () {
    return view('UserView.cart');
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
    return view('admin/mainManagement');
});
Route::get('/admin', function () {
    return view('admin/mainManagement');
});
// Route::get('/admin/menu', function () {
//     return view('admin/menuAdmin');
// });
Route::Resource('/admin/menu', MenuAdminController::class);
Route::Resource('/admin/order', OrderAdminController::class);
Route::Resource('admin/customer', CustomerController::class);
// Route::get('/admin/menu', function () {
//     return view('admin/menuAdmin', [
//         'menu' => [
//             [
//                 'id' => '1',
//                 'name' => 'Delicious Pizza',
//                 'category' => 'Pizza',
//                 'price' => '20',
//                 'stock' => '10',
//                 'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum sequi cum consequuntur quam hic corrupti ab quasi modi beatae. Culpa magni quia optio corporis rem praesentium perferendis nam veniam delectus!'
//             ],
//             [
//                 'id' => '2',
//                 'name' => 'Delicious Burger',
//                 'category' => 'Burger',
//                 'price' => '15',
//                 'stock' => '0',
//                 'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. '
//             ],
//             [
//                 'id' => '3',
//                 'name' => 'Delicious Noodle',
//                 'category' => 'Noodle',
//                 'price' => '10',
//                 'stock' => '25',
//                 'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum sequi cum consequuntur quam hic corrupti ab quasi modi beatae. Culpa magni quia optio corporis rem praesentium perferendis nam veniam delectus!'
//             ],
//             [
//                 'id' => '4',
//                 'name' => 'Delicious Steak',
//                 'category' => 'Noodle',
//                 'price' => '30',
//                 'stock' => '0',
//                 'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. '
//             ],
//         ]
//     ]);
// });