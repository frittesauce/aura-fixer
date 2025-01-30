<?php

use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLogin;

use App\Http\Middleware\Authorized;

Route::resources([
  'login' => AdminLogin::class,
  'report' => ReportController::class,
]);

Route::resource(
  "/reports",
  ReportController::class
)->middleware(Authorized::class);
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->middleware([Authorized::class]);

