<?php

use App\Http\Controllers\APIAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// API


Route::prefix("user")->group(function () {
    Route::post("register", [APIAuthController::class, 'register']);
    Route::post("login", [APIAuthController::class, 'login']);

});

Route::middleware("auth:sanctum")->group(function () {
    Route::resources([
        "products" => ProductController::class
    ]);
    Route::get("logout", [APIAuthController::class, 'logout']);
});
