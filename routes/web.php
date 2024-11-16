<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/admin', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin', [AuthController::class, 'submit'])->name('admin.login_submit');




Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    

   

    Route::get('/admin/list', function () {
        $data['header_title'] = 'Admin';
        return view('admin.admin.list', $data);
    })->name('list');
});








