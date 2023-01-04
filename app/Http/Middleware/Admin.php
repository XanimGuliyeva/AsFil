<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $url = $request->url();
        if (Auth::user()){
            if (Auth::user()->category == 'admin' || Auth::user()->category == 'manager'){
                return $next($request);
            }
        }
        return redirect('/');
    }
}
