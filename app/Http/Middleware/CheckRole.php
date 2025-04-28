<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the required role
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // If the user's role doesn't match the required one, return an error message or redirect
            if ($userRole !== $role) {
                return redirect()->route('login')->with('error', 'Access denied! You do not have sufficient privileges.');
            }

            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Please login to continue.');
    }
}
