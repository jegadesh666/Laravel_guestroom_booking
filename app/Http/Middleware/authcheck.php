<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!Session()->has('loggeduser')  and ($request->path() != 'auth/login' and $request->path() != 'auth/signup')){
            return redirect('/login')->with('error' ,'You must login');
        }

        if(Session()->has('loggeduser') and ($request->path() == 'auth/login' || $request->path() == 'auth/signup')){
            return back();
        }




        return $next($request);
       
        
    }
}
