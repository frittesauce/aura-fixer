<?php

use Illuminate\Support\Facades\Route;

Route::get('/{page?}', function (?string $page = "home" ) {
    return view('main', ['page' => $page]);
});
