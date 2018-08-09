<?php

namespace App\Http\Middleware;

use Closure;
use \App\Services\EmployeeService;

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
        $employee_id = session('employee_id');
        $service = new EmployeeService;
        $role_id = $service->FetchRoleid($employee_id);
        if($role_id == 3)
        {
            return redirect()->route('report.home.get');
        }
        return $next($request);
    }
}
