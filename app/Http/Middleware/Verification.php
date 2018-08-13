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

    public function handle($request, Closure $next)
    {
		var_dump(Auth::user());
		exit;
        if(!Auth::user())
        {
            return redirect(route('signin'));
        }
        return $next($request);
    }
}
