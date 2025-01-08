<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/post', function (Request $request) {
    return true;
});
