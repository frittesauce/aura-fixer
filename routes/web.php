<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\SessionToken;

Route::get('/{page?}', function (?string $page = "home" ) {
    return view('main', ['page' => $page]);
})->middleware([SessionToken::class]);

// Route::middleware([EnsureTokenIsValid::class])->group(function () {
//     Route::get('/', function () {
//         // ...
//     });
 
//     Route::get('/profile', function () {
//         // ...
//     })->withoutMiddleware([EnsureTokenIsValid::class]);
// });