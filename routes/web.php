<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
// MVC

Route::get('/', function () {
    return view('welcome');
});

