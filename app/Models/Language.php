<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function Employee()
    {
        return $this->belongsToMany('App\Models\Employee');
    }
    //
}
