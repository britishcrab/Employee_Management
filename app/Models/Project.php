<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee');
    }
    //
}
