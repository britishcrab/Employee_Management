<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        return view('top');
    }

    public function employee_admin(){
        echo "appcontroller";
    }
    //
}
