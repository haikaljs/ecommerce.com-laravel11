<?php

use Illuminate\Support\Facades\Route;

Route::get('admin', function () {
    return view('admin.auth.login');
});

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});

Route::get('/', function () {
    return view('welcome');
});