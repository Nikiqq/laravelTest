<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $role
     * @return mixed
     */
    
    public function handle($request, Closure $next, $role)
    {
        if(!auth()->user()->hasRole(explode('|', $role))) {
            return redirect('/');
        }
        return $next($request);
    }
}