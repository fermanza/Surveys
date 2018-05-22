<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Auth;

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
        $user = $request->user();
        $routeName = Route::getCurrentRoute()->getName();

        if(!Auth::user()->role==10)
        {
            return redirect()->intended('/');
        }

        return $next($request);
    }
}
