<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Mentor\RoleMentorController;
use App\Http\Controllers\Santri\RoleSantriController;
use App\Http\Controllers\Mentor\CreateMentorController;
use App\Http\Controllers\Superadmin\SuperAdminController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin only routes
    Route::middleware(['can:admin'])->group(function () {
        Route::resource('batches', BatchController::class);
        Route::resource('divisions', DivisionController::class);
        Route::resource('santris', SantriController::class);
        Route::resource('attendance-sessions', AttendanceSessionController::class);
        Route::get('/attendances/export', [AttendanceController::class, 'export'])->name('attendances.export');
        Route::resource('attendances', AttendanceController::class);
        Route::resource('mentors', CreateMentorController::class);
        Route::resource('superadmins', SuperAdminController::class);
        Route::resource('admins', AdminController::class);
    });

    // Mentor only
    Route::middleware(['can:mentor'])->group(function () {
        Route::get('/role-mentor', [RoleMentorController::class, 'mentor']);
    });

    // Santri only
    Route::middleware(['can:santri'])->group(function () {
        Route::get('/role-santri', [RoleSantriController::class, 'santri']);
    });
});
