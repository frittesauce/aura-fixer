<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/post', [\App\Http\Controllers\DBController::class, 'write'])
    ->middleware(\App\Http\Middleware\CheckData::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/post', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
