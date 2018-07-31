<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function get_home(){
        return view('report.home');
    }

    public function get_create(){
        return view('report.create');
    }

    public function post_create(Request $request){
        return redirect()->route('report.get.create.confirm', $request);
    }

    public function get_create_confirm(Request $request){
        return view('report.create_confirm', $request);
    }
    //
}
