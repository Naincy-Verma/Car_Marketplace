<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/','pages.index');
Route::view('/','pages.index2');
Route::view('/car/login','pages.login');
Route::view('/car/dashboard','pages.seller');
Route::view('/car/post-car','pages.post-car');
Route::view('/car/profile','pages.edit-profile');
Route::view('/car/search','pages.car-search');
Route::view('/car/listing','pages.car-listing');
Route::view('/car/detail','pages.car-detail');

// Route::view('login','adminpages.login');

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Protected Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});