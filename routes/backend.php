<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\AdminDashboard;
use Illuminate\Support\Facades\Route;

//ADMIN DASHBOARD ROUTES
Route::get('/admin-dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');


//CATEGORY ROUTES
Route::group(['prefix' => 'category'], function () {
    Route::get('/list', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
});
