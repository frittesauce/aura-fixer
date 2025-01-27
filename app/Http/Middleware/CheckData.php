<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->post('name')) {
            return response()->json(['error' => 'Name is required'], Response::HTTP_BAD_REQUEST);
        } else if (!$request->post('email')) {
            return response()->json(['error' => 'Email is required'], Response::HTTP_BAD_REQUEST);
        } else if (!$request->post('description')) {
            return response()->json(['error' => 'Description is required'], Response::HTTP_BAD_REQUEST);
        }
        return $next($request);
    }
}
