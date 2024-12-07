<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;





//pages
Route::get("/login", [UserController::class, "login_page"])->name('login');
Route::get("/registration", [UserController::class, "registration_page"]);


Route::post("/user-registration", [UserController::class, "registration"]);
Route::post("/user-login", [UserController::class, "login"]);


//dashboard
Route::get('/dashboard', [DashboardController::class, "dashboardPage"])->middleware('auth:sanctum');

