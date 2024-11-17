<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/admin', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin', [AuthController::class, 'submit'])->name('admin.login_submit');




Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/index', [AdminController::class, 'index'])->name('index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    

   

    
});








