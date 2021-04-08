<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::user() && Auth::user()->isAdmin() ) 
        {
            return $next($request);
        }else
        {
             return redirect()->route('admin.login')->with('error',"vous n'etes pas admin ne plus ");
        }
    }
   
}
