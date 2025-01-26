<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

define("SESSION_EXPIRE_MINUTES", 5);
define("SESSION_EXPIRE_MINUTES_COOKIE", 60);

class AdminLogin extends Controller
{
    public function store(Request $request)
    {

        $credentials = $request->json()->all();
        $username = $credentials['username'];
        $password = $credentials['password'];

        $data = DB::table('admin')->where("username", $username);

        $hash = $data->value("password");
        $userid = $data->value("user_id");

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

        $session = array();
        $session["token"] = $token;
        $session["user_id"] = $userid;
        $session["expire"] = time() + SESSION_EXPIRE_MINUTES * 60;
        DB::table("active_sessions")->insert($session);

        $cookie = cookie("session_token", $token, SESSION_EXPIRE_MINUTES_COOKIE);
        return response([])->withCookie($cookie);
    }
}
