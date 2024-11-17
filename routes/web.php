<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;


Route::get('/admin', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin', [AuthController::class, 'submit'])->name('admin.login_submit');




Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Admin

    Route::get('/admin/index', [AdminController::class, 'index'])->name('index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');

    // Category
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // Sub category
    Route::get('/subcategory/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::put('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
    

   

    
});








