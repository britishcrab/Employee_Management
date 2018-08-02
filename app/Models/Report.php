<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function employees()
    {
        return $this->belongsTo('\App\Models\Employee');
    }

    public function report()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
