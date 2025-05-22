<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SentryMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Placeholder for Sentry integration
        return $next($request);
    }
}
