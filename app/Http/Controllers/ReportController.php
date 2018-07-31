<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function get_home(){
        return view('report.get.home')
    }
    //
}
