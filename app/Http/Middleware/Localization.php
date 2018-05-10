<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;

class Localization
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
        session_start();
        if(isset($_SESSION["language"]))
        {
            $language = $_SESSION["language"];
        }else{
            $_SESSION["language"]='es';
            $language="es";
        }
        
        \App::setLocale($language);
        return $next($request);
    }
}
