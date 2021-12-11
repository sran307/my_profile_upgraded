<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PageAccess
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
        $page=$request->path();
        $id=session()->get("login_id");
        if(($page=="login" || $page=="register") && ($id!=null))
        {
            return redirect()->route("dashboard")->with([
                Session::flash("message", "You cannot access the page. Please login first."),
                Session::flash("alert-class", "alert-danger")
            ]);
        }
        else
        {
            return $next($request);
        }
        
    }
}
