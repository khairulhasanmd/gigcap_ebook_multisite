<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $level
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $level)
    {
        // Check if the user is authenticated and has the required admin level
        
        // Redirect to some page if the admin level is not sufficient
        dd('working');
        return redirect()->route('home'); // or any other route you want to redirect to
    }
}
