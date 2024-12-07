<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

//pages
Route::get("/login", [UserController::class, "login_page"]);
Route::get("/registration", [UserController::class, "registration_page"]);


Route::post("/user-registration", [UserController::class, "registration"]);
Route::post("/user-login", [UserController::class, "login"]);

