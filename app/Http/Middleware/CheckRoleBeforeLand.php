<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleBeforeLand
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
        if(auth()->user()->role_id == 2){
            return redirect('/dashboard')->with('error','You are Not Allowed to access that part');
        }else {
            return $next($request);
        }
    }
}
