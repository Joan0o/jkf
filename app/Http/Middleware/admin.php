<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Closure;
use Auth;
use Middleware;

class admin
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
        if(Auth::id() != null){
            if(Auth::user()->rol != 'admin'){
                return redirect('/');
            }
            return $next($request);
        }
        return redirect('/');
    }
}
