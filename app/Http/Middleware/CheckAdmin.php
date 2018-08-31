<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if(!auth()->check()){
            return redirect('login');
        }

        if(!auth()->user()->is_admin){
            return redirect()->route('reports.reports');
        }

        return $next($request);
    }
}
