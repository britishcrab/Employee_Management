<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function report()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function role()
    {
        return $this->belongsTo('\App\Models\Role');
    }
    //
}