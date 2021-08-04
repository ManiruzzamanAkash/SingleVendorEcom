<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @todo Will fix this route redirecting issue
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // $guard = 'test'; // Get guard name and redirect

            // switch ($guard) {
            //   case 'admin':
            //   $login = "admin.login";
            //   break;

            //   case 'web':
            //   $login = "login";
            //   break;

            //   default:
            //   $login = "login";
            //   break;
            // }
            return route('login');
        }
    }
}