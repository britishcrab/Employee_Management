<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $fillable = ['last_name', 'first_name', 'mail', 'password', 'birthday', 'role_id'];
    protected $hidden = ['password', 'remember_token',];

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
        return $this->belongsTo('App\Models\Role');
    }
    //
}