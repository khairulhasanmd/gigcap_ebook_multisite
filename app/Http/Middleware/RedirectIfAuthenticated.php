<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard == "user" && Auth::guard('user')->check() && Auth::user()->role()->type == "admin") {
            return redirect()->intended(route('dashboard'));
        } elseif ($guard == "user" && Auth::guard('user')->check() && Auth::user()->role()->type == "user") {
            return redirect()->intended(route('openai'));
        }

        return $next($request);
    }
}
