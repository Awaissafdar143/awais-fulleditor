<?php

namespace Awaistech\Larpack\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Awaistech\Larpack\Models\Setting;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Always allow login pages (adjust these patterns as needed)
        if ($request->is('login') || $request->is('admin/login')) {
            return $next($request);
        }

        // Check the maintenance mode setting (assuming "1" means enabled)
        $maintenanceEnabled = Setting::get('maintenance_enabled', '0') === '1';

        if ($maintenanceEnabled) {
            // Allow authenticated admin users to bypass maintenance mode
            if (Auth::check() && in_array(Auth::user()->role, ['admin', 'super'])) {
                return $next($request);
            }

            // Retrieve the maintenance page content
            $content = Setting::get('maintenance_content', 'The site is under maintenance. Please check back soon.');

            // Return the custom maintenance view with a 503 status code
            return response()->view('maintenance', ['content' => $content], 503);
        }

        return $next($request);
    }
}
