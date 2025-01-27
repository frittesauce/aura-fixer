<?php

use App\Http\Middleware\IsAuthorized;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function IsAuthorized(string $page, Request $request): bool
{
    $token = $request->cookie("session_token");
    if (empty($token)) {
        return false;
    }

    DB::table("active_sessions")->where("expire", "<", time())->delete();

    $data = DB::table("active_sessions")->where("token", $token);
    $user_id = $data->value("user_id");

    if (empty($user_id)) {
        return false;
    }

    return true;
}

Route::get("/{page?}", function (Request $request, ?string $page = "home") {
    $IsAuthorized = IsAuthorized($page, $request);

    return view("main", [
        "page" => $page,
        "authorized" => $IsAuthorized ? "true" : "false",
    ]);
}


