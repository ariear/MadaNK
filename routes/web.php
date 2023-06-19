<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPenjualanController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\FoodMenuController;
use App\Http\Controllers\InvoiceDashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuFoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/foodsmenu', [MenuFoodController::class,'index']);
Route::get('/location', [LocationController::class,'index']);

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'store']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [LoginController::class,'register'])->middleware('guest');
Route::post('/register', [LoginController::class,'store_register']);

Route::get('/dashboard', [DashboardController::class,'index'])->middleware('owner');

Route::resource('/dashboard/foodmenu', FoodMenuController::class)->middleware('owner');
Route::resource('/dashboard/categories', CategoryController::class)->middleware('owner');
Route::resource('/dashboard/penjualan', DashboardPenjualanController::class)->middleware('owner');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');

Route::get('/dashboard/penjualan/invoice/{no_order}', [InvoiceDashboardController::class,'index'])->middleware('owner');
