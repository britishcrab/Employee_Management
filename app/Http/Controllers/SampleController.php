<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function dbtest(){
        \DB::table('employees')->insert(
            ['employee_number' => '0000', 'name' => 'sample tarou', 'birthday' => '1000-01-01']
        );
    }
    //
}
