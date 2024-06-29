<?php

namespace App\Http\Middleware;

use App\Models\TimeZone;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class SetTimezone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $timezone = TimeZone::first();
        if ($timezone) {
            Config::set('app.timezone', $timezone->name);
            date_default_timezone_set($timezone->name);
        }
        
        return $next($request);
    }
}