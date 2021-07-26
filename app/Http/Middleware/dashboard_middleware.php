<?php

namespace App\Http\Middleware;

use Closure;

class dashboard_middleware
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
        if(auth()->user()->roles_name == ["user"]){
            return redirect()->route('website');

        }else{
            return $next($request);
        }
    }
}
