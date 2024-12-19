<?php

namespace Plugins\Requests\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateApi
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->bearerToken();

        if ($apiKey !== config('requests.api_key')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}