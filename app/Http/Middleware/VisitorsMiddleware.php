<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VisitorsMiddleware
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
        if(!Sentinel::check()) //is false
            /*\Log::info('role', ['role'=> Sentinel::getUser() -> roles() -> first()]);*/
            return $next($request);        
        else
            return redirect('/');
    }
}
