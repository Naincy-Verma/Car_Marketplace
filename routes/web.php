<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/','pages.index');
Route::view('/', 'pages.index2');
Route::view('/car/login', 'pages.login');
Route::view('/car/dashboard', 'pages.seller');
Route::view('/car/post-car', 'pages.post-car');
Route::view('/car/profile', 'pages.edit-profile');
Route::view('/car/search', 'pages.car-search');
Route::view('/car/listing', 'pages.car-listing');
Route::view('/car/detail', 'pages.car-detail');

// Route::view('login','adminpages.login');

// Login & Logout

// Show login form
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])
    ->name('admin.login');
// Handle login submission
Route::post('/admin/login', [LoginController::class, 'login'])
    ->name('admin.login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

/*
 * |--------------------------------------------------------------------------
 * | Admin Routes
 * |--------------------------------------------------------------------------
 */

// Admin Protected Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin')->group(function () {
        // Brand Routes
        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

        // Category Routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Listing Routes
        Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
        Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
        Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
        Route::get('/listings/{id}/edit', [ListingController::class, 'edit'])->name('listings.edit');
        Route::put('/listings/{id}', [ListingController::class, 'update'])->name('listings.update');
        Route::delete('/listings/{id}', [ListingController::class, 'destroy'])->name('listings.destroy');

        //User Routes
        Route::get('/users', [UserController::class,'index'])->name('users.index');
        Route::get('/users/create', [UserController::class,'create'])->name('users.create');
        Route::post('/users', [UserController::class,'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');
    });
});
