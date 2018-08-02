<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
    //
}
