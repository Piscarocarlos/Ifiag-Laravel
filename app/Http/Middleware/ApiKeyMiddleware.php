<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->header("API_KEY") !== config("services.api_key")) {
            return response()->json([
                "message" => "Unauthorized! Please provide a valid API key."
            ], 401);
        }
        return $next($request);
    }
}
