<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class SetLanguage
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
        $locale = 'ru';


        if ( Session::has('applocale')) {
            $locale = Session::get('applocale');
        }
    
    
        \App::setLocale($locale);
        return $next($request);
    }
}
