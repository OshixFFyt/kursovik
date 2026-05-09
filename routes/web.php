<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\ChickenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WorkerController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('chickens', ChickenController::class)->except(['show']);
    Route::resource('breeds', BreedController::class)->except(['show']);
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/export', [ReportController::class, 'export'])->name('reports.export');

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::resource('workers', WorkerController::class)->except(['show']);
    });
});
