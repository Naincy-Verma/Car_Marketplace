<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\FuelTypeController;
use App\Http\Controllers\TransmissionTypeController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ListingMediaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/','pages.index');
Route::view('/', 'pages.index2')->name('home');
Route::view('/car/login', 'pages.login');
Route::view('/car/dashboard', 'pages.seller');
Route::view('/car/profile', 'pages.edit-profile');
Route::view('/car/search', 'pages.car-search');
Route::view('/car/listing', 'pages.car-listing');
Route::view('/car/detail', 'pages.car-detail');

// User post car routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/car/post-car', [ListingController::class, 'createUserListing'])->name('user.post-car');
    Route::post('/car/post-car', [ListingController::class, 'storeUserListing'])->name('user.post-car.store');
    Route::get('/car/dashboard', [ListingController::class, 'userDashboard'])->name('user.dashboard');
});

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

         // Fuel Type Routes
        Route::get('/fuel-types', [FuelTypeController::class, 'index'])->name('fuel_type.index');
        Route::get('/fuel-types/create', [FuelTypeController::class, 'create'])->name('fuel_type.create');
        Route::post('/fuel-types', [FuelTypeController::class, 'store'])->name('fuel_type.store');
        Route::get('/fuel-types/{id}/edit', [FuelTypeController::class, 'edit'])->name('fuel_type.edit');
        Route::put('/fuel-types/{id}', [FuelTypeController::class, 'update'])->name('fuel_type.update');
        Route::delete('/fuel-types/{id}', [FuelTypeController::class, 'destroy'])->name('fuel_type.destroy');

        // Transmission Types
        Route::get('/transmissions', [TransmissionTypeController::class, 'index'])->name('transmission_type.index');
        Route::get('/transmissions/create', [TransmissionTypeController::class, 'create'])->name('transmission_type.create');
        Route::post('/transmissions', [TransmissionTypeController::class, 'store'])->name('transmission_type.store');
        Route::get('/transmissions/{id}/edit', [TransmissionTypeController::class, 'edit'])->name('transmission_type.edit');
        Route::put('/transmissions/{id}', [TransmissionTypeController::class, 'update'])->name('transmission_type.update');
        Route::delete('/transmissions/{id}', [TransmissionTypeController::class, 'destroy'])->name('transmission_type.destroy');

        // Years
        Route::get('/years', [YearController::class, 'index'])->name('years.index');
        Route::get('/years/create', [YearController::class, 'create'])->name('years.create');
        Route::post('/years', [YearController::class, 'store'])->name('years.store');
        Route::get('/years/{id}/edit', [YearController::class, 'edit'])->name('years.edit');
        Route::put('/years/{id}', [YearController::class, 'update'])->name('years.update');
        Route::delete('/years/{id}', [YearController::class, 'destroy'])->name('years.destroy');

        // Locations
        Route::get('/locations', [LocationController::class, 'index'])->name('location.index');
        Route::get('/locations/create', [LocationController::class, 'create'])->name('location.create');
        Route::post('/locations', [LocationController::class, 'store'])->name('location.store');
        Route::get('/locations/{id}/edit', [LocationController::class, 'edit'])->name('location.edit');
        Route::put('/locations/{id}', [LocationController::class, 'update'])->name('location.update');
        Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('location.destroy');
       
        // Models 
        Route::get('/carmodels', [ModelController::class, 'index'])->name('model.index');
        Route::get('/carmodels/create', [ModelController::class, 'create'])->name('model.create');
        Route::post('/carmodels', [ModelController::class, 'store'])->name('model.store');
        Route::get('/carmodels/{id}/edit', [ModelController::class, 'edit'])->name('model.edit');
        Route::put('/carmodels/{id}', [ModelController::class, 'update'])->name('model.update');
        Route::delete('/carmodels/{id}', [ModelController::class, 'destroy'])->name('model.destroy');

        // Listing Media Routes
        Route::get('/listing-media', [ListingMediaController::class, 'index'])->name('listing_media.index');
        Route::get('/listing-media/create', [ListingMediaController::class, 'create'])->name('listing_media.create');
        Route::post('/listing-media', [ListingMediaController::class, 'store'])->name('listing_media.store');
        Route::get('/listing-media/{listingMedia}/edit', [ListingMediaController::class, 'edit'])->name('listing_media.edit');
        Route::put('/listing-media/{listingMedia}', [ListingMediaController::class, 'update'])->name('listing_media.update');
        Route::delete('/listing-media/{listingMedia}', [ListingMediaController::class, 'destroy'])->name('listing_media.destroy');
    });
});


// Route::view('register','pages.form.register');
// Route::view('login','pages.form.login');

// Auth routes
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register']);
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login']);
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');