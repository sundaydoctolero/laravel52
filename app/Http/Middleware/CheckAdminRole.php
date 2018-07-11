<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(auth()->guard('admin')->user() === null){
            return view('admin/login');
        }

        if(auth()->guard('admin')->user()->hasAnyRole($roles)){
            return $next($request);
        }

        return response('Permission Insufficient',403);

    }
}
