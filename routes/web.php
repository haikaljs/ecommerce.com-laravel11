<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'submit'])->name('login_submit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin/list', function () {
        return view('admin.admin.list');
    })->name('list');
  
});






Route::get('/', function () {
    return view('welcome');
});