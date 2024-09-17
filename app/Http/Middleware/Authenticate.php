<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory;

class Authenticate extends Middleware
{
    /**
     * Logout inactive user.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Factory $auth)
    {
        parent::__construct($auth);

        $user = auth()->user();
        if (empty($user)) {
            return;
        }

        if ($user->status != 'Active') {
            \Auth::logout();
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
