<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Authuser
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
        // Not Logged
        if (!Auth::check()) {
            return redirect('/inicio_sesion');
        }

        // Not allowed
        /*if ($request->user()->role < $role) {
            return abort(404);
        }*/
        return $next($request);
    }
}
