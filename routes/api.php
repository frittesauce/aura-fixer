<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::post('/post', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

define("SESSION_EXPIRE_MINUTES", 1);
define("SESSION_EXPIRE_MINUTES_COOKIE", 1);

Route::post('/login', function (Request $request) {
    $credentials = $request->json()->all();
    $username = $credentials['username'];
    $password = $credentials['password'];

    $data = DB::table('admin')->where("username", $username);

    $hash = $data->value("password");
    $userid = $data->value("id");

    if ($hash == null || $userid == null) {
        return [
            "error" => "Failed to find user"
        ];
    };

    $correct_password = password_verify($password, $hash);

    if ($correct_password == false) {
        return [
            "error" => "Wrong password"
        ];
    }

    DB::table('active_sessions')
        ->where('expire', '<', time())
        ->delete();


    $token = str()->random(64);

    $session["token"] = $token;
    $session["user_id"] = $userid;
    $session["expire"] = time() + SESSION_EXPIRE_MINUTES * 60;
    DB::table("active_sessions")->insert($session);

    return redirect('../testing')->withCookie(cookie("session_token", $token, SESSION_EXPIRE_MINUTES_COOKIE));

    // return [
    // "id" => $userid,
    // "token" => $token
    // ];
});
