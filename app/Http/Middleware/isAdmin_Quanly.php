<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin_Quanly
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
        if (Auth::check()) {
            if(Auth::user()->is_quyen()==2 || Auth::user()->is_quyen()==3){
                return $next($request);
            } else {
                return  ($request->ajax()) ?  response('Forbidden', 403) : redirect()->route('home.404');
            }

        }else{
            return redirect()->route('login');
        }
    }
}
