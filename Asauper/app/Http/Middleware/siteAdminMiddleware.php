<?php

namespace App\Http\Middleware;

use Closure;

class siteAdminMiddleware
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
        if(auth()->user()->user_type !='site_admin'){
            return abort(403,"Unauthorized Access!");
        }
        return $next($request);
    }
}
