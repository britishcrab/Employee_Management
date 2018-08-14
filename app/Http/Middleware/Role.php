<?php

namespace App\Http\Middleware;

use Closure;
use \App\Services\EmployeeService;
use Illuminate\Support\Facades\Auth;

class Role
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
        // $role_id = Auth::user()->role_id;
        $role_id = Auth::guard('original')->user()->role_id;
        if($role_id == 3)
        {
            return redirect()->route('report.home.get');
        }
        return $next($request);
    }
}
