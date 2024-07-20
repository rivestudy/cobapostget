<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomizationController;
use App\Http\Controllers\HomeController;

// Landing page or customization view
Route::get('/', function () {
    return view('app');
});

// Authentication routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Home route, protected by auth middleware
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Grouped routes with auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/customization/edit', [CustomizationController::class, 'edit'])->name('customization.edit');
    Route::post('/customization/update', [CustomizationController::class, 'update'])->name('customization.update');
});

