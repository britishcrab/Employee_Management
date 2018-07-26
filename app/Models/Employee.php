<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function project()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    public function language()
    {
        return $this->belongsToMany('App\Models\Language');
    }

    public function employee_type()
    {
        return $this->belongsToMany('App\Models\EmployeeType');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    //
}
