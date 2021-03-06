<?php

namespace Fresh\Medpravda\Http\Middleware;

use Closure;
use Gate;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard()->guest()) {
            return redirect()->guest('/manage/login');
        }
        return $next($request);
    }
}
