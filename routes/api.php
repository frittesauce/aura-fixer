<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminLogin;

Route::post('/post', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resources([
    'login' => AdminLogin::class
]);
