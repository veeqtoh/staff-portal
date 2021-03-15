<?php

namespace App\Http\Middleware;
use Auth;
use Session;
use Closure;

class CheckHr
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
        if (Auth::user()->role != 1) {

            Session::flash('warning', 'You do not have access to perform this action.');
            return redirect()->back();
        }

        return $next($request);
    }
}
