<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/{page?}', function (?string $page = "home" ) {
    return view('main', ['page' => $page]);
});

Route::resources([
    'report' => ReportController::class,
]);


