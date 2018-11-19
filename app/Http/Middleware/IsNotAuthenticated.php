<?php

namespace App\Http\Middleware;

use Closure;

class IsNotAuthenticated
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
        if(isset(Auth::user()->rol)){

        }
        return $next($request);
    }
}
