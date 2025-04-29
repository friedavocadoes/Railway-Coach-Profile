<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\MaintenanceLogController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Home Page
Route::get('/', function () {
    return view('home');
});

// User registration Routes
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// User Login Routes
Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Dashboard Routes
// Route group for authenticated users
Route::middleware('auth')->group(function () {

    // Dashboard route: check role and redirect
    Route::get('dashboard', function () {
        // Check user's role and redirect
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('technician.dashboard');
        }
    })->name('dashboard');


    Route::prefix('dashboard')->group(function () {
        // Admin Dashboard Route
        Route::get('admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        // Technician Dashboard Route
        Route::get('technician', [DashboardController::class, 'technicianDashboard'])->name('technician.dashboard');
    });

    // Resource controllers for maintenance logs and coaches
    Route::resource('maintenance-logs', MaintenanceLogController::class);
    Route::resource('coaches', CoachController::class);
});

// Coach and Maintenance routes (authenticated)
// Route::middleware(['auth'])->group(function () {
//     Route::resource('maintenance-logs', MaintenanceLogController::class);

//     // Only admins can access coaches management
//     Route::middleware([CheckRole::class . ':admin'])->group(function () {
//         Route::resource('coaches', CoachController::class);
//     });
// });