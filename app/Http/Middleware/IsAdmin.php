<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }elseif(Auth::guard('pemda')->check()) {
              return redirect('/pemda');
        }elseif(Auth::guard('pengelola')->check()) {
            return redirect('/pengelola');
        }elseif(Auth::guard('pedagang')->check()) {
            return redirect('/pedagang');
        } 
      
          return $next($request);
    }
}
