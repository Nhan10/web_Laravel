<?php

namespace App\Http\Middleware;

use Closure;

class isKhachhang
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
            if(Auth::user()->is_quyen()==1){
                return $next($request);
            } else {
                return  ($request->ajax()) ?  response('Forbidden', 403) : redirect()->route('home.404');
            }

        }else{
            return redirect()->route('login');
        }
    }
}
