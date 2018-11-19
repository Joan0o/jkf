<?php

namespace App\Http\Middleware;

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
                return redirect('welcome');
            }
        }
        
        return $next($request);

    }
}
