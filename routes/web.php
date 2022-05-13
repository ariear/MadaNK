<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class,'index'])->middleware('guest');
Route::post('/login', [LoginController::class,'store']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [LoginController::class,'register'])->middleware('guest');
Route::post('/register', [LoginController::class,'store_register']);
