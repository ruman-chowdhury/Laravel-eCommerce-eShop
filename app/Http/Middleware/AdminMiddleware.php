<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
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
       //check authenticated(admin) or not ; url pattern checking, request()->is() helper method
        if (Auth::guard('admin')->check()==true && request()->is('admin/*')){

           return $next($request);
       }else{

           return redirect()->route('home');
       }


    }
}
