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
    Route::get('/orders/edit',  [OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
