<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    public function Employee()
    {
        return $this->belongsToMany('App\Models\Employee');
    }
    //
}
