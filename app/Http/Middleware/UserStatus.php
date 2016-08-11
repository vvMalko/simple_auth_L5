<?php

namespace App\Http\Middleware;

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
        return $next($request);
        if (Auth::user())
        {
            // Auth::user() возвращает объект пользователя...
        }
    }
}
