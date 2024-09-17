<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $level
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
            return $next($request);
    }
}
