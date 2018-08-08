<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['employee_id', 'title', 'content', 'created_at'];

    public function employee()
    {
        return $this->belongsTo('\App\Models\Employee');
    }

    public function report()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
