<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['last_name', 'first_name', 'mail', 'password', 'birthday', 'role_id'];

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