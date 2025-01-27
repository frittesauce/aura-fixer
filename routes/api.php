<?php

use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLogin;

Route::resources([
    'login' => AdminLogin::class,
  'report' => ReportController::class,
]);
