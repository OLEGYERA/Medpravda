<?php

namespace Fresh\Medpravda\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class OnEnter
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
        if (!Auth::guest() and Auth::id()==27)
        {
            //Config::set('app.debug', true);
            \Debugbar::enable();
        }else{
            \Debugbar::disable();
        }

        return $next($request);
    }
}
