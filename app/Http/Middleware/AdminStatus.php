<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminStatus
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
        if (Auth::user()->status !== 100)
        {
            return redirect()->intended('/');
        }
        return $next($request);
    }
}
