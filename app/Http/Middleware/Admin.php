<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // check user's authentication, if user is an admin, carry on next request (admin request), if not, redirect.
        if(Auth::check()){

            if(Auth::user()->isAdmin()){

                return $next($request);

            }

        }

        return redirect('/404');


    }
}
