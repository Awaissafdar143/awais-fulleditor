<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
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
        // Check if the user is authenticated and has the 'super' role
        if (Auth::check() && Auth::user()->role == 'super') {
            return $next($request);
        }

        // Redirect unauthorized users or handle forbidden access
        return redirect()->route('login')->with('error', 'Access denied. Super Admins only.');
    }
}
