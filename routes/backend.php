<?php

use App\Http\Controllers\Dashboard\AdminDashboard;
use Illuminate\Support\Facades\Route;

//ADMIN DASHBOARD ROUTES
Route::get('/admin-dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
