<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

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

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/community', function () {
    return view('pages.community');
});

Route::get('/gallery', function () {
    return view('pages.gallery');
});

Route::get('/resources', function () {
    return view('pages.resources');
});

// Dashboard Routes - Protected by Auth Middleware
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    // Main Dashboard
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('index');
    
    // Events Management
    Route::get('/events', function () {
        return view('dashboard.events.index');
    })->name('events.index');
    Route::get('/events/create', function () {
        return view('dashboard.events.create');
    })->name('events.create');
    
    // Gallery Management
    Route::get('/gallery', function () {
        return view('dashboard.gallery.index');
    })->name('gallery.index');
    
    // Resources Management
    Route::get('/resources', function () {
        return view('dashboard.resources.index');
    })->name('resources.index');
    
    // Users Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch('/users/{user}/status', [UserController::class, 'updateStatus'])->name('users.update.status');
    Route::post('/users/bulk-action', [UserController::class, 'bulkAction'])->name('users.bulk.action');
    
    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
});
