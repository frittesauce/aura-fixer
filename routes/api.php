<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminLogin;

Route::resources([
    'login' => AdminLogin::class
]);
