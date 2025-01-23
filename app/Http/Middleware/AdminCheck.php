<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // dd('here working');
        if (Auth::check()) {
            // dd(Auth::user());
            if (Auth::user()->is_admin == 1) {
                return $next($request);
            } else {
                // return $next($request);
                return redirect('/products');
                // return view('admin.unauthorized');
            }
        }
        return redirect('/login');
       
    }
}
