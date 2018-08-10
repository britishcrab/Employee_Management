<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Verification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        if(empty(session('signin')))
//        {
//            return redirect(route('signin'));
//        }
//        return $next($request);
//    }

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            echo "ログイン済みのユーザー！";
        }    }
}
