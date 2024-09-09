<?php

use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**BACKEND */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');

/**USER */
Route::prefix('user/')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index')->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware('admin');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('admin')->where('id', '[0-9]+');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('admin')->where('id', '[0-9]+');
    Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('admin')->where('id', '[0-9]+');
});


/**AJAX */
Route::post('/ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index')->middleware('admin');



/**AUTH */
Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
