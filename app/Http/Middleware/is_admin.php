<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role=session()->get("user_type");
        if($role==1)
        {
            return $next($request);
        }
        else
        {
            abort(403);
        }
    }
}
