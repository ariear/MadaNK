<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\FoodMenuController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'store']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [LoginController::class,'register'])->middleware('guest');
Route::post('/register', [LoginController::class,'store_register']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('owner');

Route::resource('/dashboard/foodmenu', FoodMenuController::class)->middleware('owner');
Route::resource('/dashboard/categories', CategoryController::class)->middleware('owner');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');
