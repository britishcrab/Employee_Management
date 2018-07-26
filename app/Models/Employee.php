<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Models\Language');
    }

    public function employee_types()
    {
        return $this->belongsToMany('App\Models\EmployeeType');
    }

    public function roles()
    {
        return $this->belongsToMany('\App\Models\Role');
    }
    //
}
