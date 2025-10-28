<?php

namespace MahmoudMosaad\PowerKit\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PowerKitMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Example: block requests if PowerKit disabled
        if (!config('powerkit.enabled', true)) {
            abort(503, 'PowerKit is disabled.');
        }

        return $next($request);
    }
}
