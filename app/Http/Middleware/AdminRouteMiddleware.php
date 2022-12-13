<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminRouteMiddleware
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
//        dd($request->all());
        if (request()->is('dashboard')){
            return redirect()->route('admin.index');
        }else{
            return $next($request);
        }
    }
}
