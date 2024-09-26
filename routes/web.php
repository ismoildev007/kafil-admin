<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin');
    })->name('dashboard');
    Route::get('/orders',  [OrderController::class, 'index'])->name('orders.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
