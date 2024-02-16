<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('products',ProductController::class);


    // Route model binding
    // Type hin
    // Request Class
    // -mcr
    // laravel naming convention
    // laravel blade directives
    // Dependency Injection
