<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class Authorized
{
    public function IsAuthorized(Request $request): bool
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

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->IsAuthorized($request)) {
            return response(view("main", [
                "page" => "login",
                "authorized" => "false",
            ]));
        }
        return $next($request);
    }
}
