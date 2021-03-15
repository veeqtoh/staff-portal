<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role === 0) {
            //return redirect('/homes');
            return redirect(RouteServiceProvider::STAFF);
        }
        elseif (Auth::guard($guard)->check() && Auth::user()->role === 1) {
            return redirect(RouteServiceProvider::HR);
        }
        elseif (Auth::guard($guard)->check() && Auth::user()->role === 2) {
            return redirect(RouteServiceProvider::CREW);
        }
        elseif (Auth::guard($guard)->check() && Auth::user()->role === 3) {
            return redirect(RouteServiceProvider::ADMIN);
        }
        elseif (Auth::guard($guard)->check() && Auth::user()->role === 4) {
            return redirect(RouteServiceProvider::MD);
        }

        return $next($request);
    }
}
