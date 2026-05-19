<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffMemberController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;

Route::get('/', fn() => redirect()->route('login'));

// Auth
Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('students',   StudentController::class);
    Route::resource('staff',      StaffMemberController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});
