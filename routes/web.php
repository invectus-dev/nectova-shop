<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shop.index');
});

Route::resource('/admin', ProductController::class);