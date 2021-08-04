<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Support\Facades\Auth;

// class RedirectIfAuthenticated
// {
//   /**
//   * Handle an incoming request.
//   *
//   * @param  \Illuminate\Http\Request  $request
//   * @param  \Closure  $next
//   * @param  string|null  $guard
//   * @return mixed
//   */
//   public function handle($request, Closure $next, $guard = null)
//   {
//     switch ($guard) {
//       case 'admin':
//       if (Auth::guard($guard)->check()) {
//         return redirect()->route('admin.index');
//       }
//       break;

//       case 'web':
//       if (Auth::guard($guard)->check()) {
//         return redirect()->route('user.dashboard');
//       }
//       break;
//     }

//     return $next($request);
//   }
// }

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}