<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;


Route::get('/admin', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin', [AuthController::class, 'submit'])->name('admin.login_submit');




Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin/list', function () {
        return view('admin.admin.list');
    })->name('list');
});








