<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class employe_auth
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
        if($request->session()->has('employe_login')){

        }else{
            return redirect('/')->with('msg','access denied!!');
        }
        return $next($request);
    }
}
