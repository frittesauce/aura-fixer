<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Middleware\Authorized;

Route::get("/{page?}", function (Request $request, ?string $page = "home") {
    $authorized = new Authorized();
    $IsAuthorized = $authorized->IsAuthorized($request);

    return view("main", [
        "page" => $page,
        "authorized" => $IsAuthorized ? "true" : "false",
    ]);
});


