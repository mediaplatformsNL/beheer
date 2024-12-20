<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class ValidateApiKeyAndDomain
{
    public function handle(Request $request, Closure $next)
    {
        // Haal de toegestane domeinen op uit de database
        $allowedDomainsSetting = Setting::where('name', 'api_urls')->first();
        $allowedDomains = $allowedDomainsSetting ? explode(',', $allowedDomainsSetting->value) : [];

        $apiKey = config('requests.api_key');
        $requestApiKey = $request->route('api_key');

        // Controleer de api_key
        if ($requestApiKey !== $apiKey) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Controleer het domein
        $origin = $request->headers->get('Origin');
        $originHost = parse_url($origin, PHP_URL_HOST);
        Log::info('Origin Host: ' . $originHost);

        if (!in_array($originHost, $allowedDomains)) {
            return response()->json(['error' => 'Unauthorized domain'], 403);
        }

        return $next($request);
    }
} 