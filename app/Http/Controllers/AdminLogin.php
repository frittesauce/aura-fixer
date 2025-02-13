<?php

namespace App\Http\Controllers;

use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

define("SESSION_EXPIRE_MINUTES", 5);
define("SESSION_EXPIRE_MINUTES_COOKIE", 60);

class AdminLogin extends Controller
{
    public function index(Request $request)
    {
        $token = $request->cookie("session_token");

        $data = DB::table("active_sessions")->where("token", $token);
        $session = array();
        $session["expire"] = time() + SESSION_EXPIRE_MINUTES * 60;
        $data->update($session);

        return response()->json($data->value("expire"));

        // $data->expire = time() + SESSION_EXPIRE_MINUTES * 60;
    }
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
