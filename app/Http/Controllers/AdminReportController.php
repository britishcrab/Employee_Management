<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    protected $service;

    public function index(){
        $this->service = new \App\Services\TestService;
    }
    public function get_list(){
        $service = new \App\Services\TestService;

        $reports = $service->reports_get();

        return view('admin_report.list', compact('reports'));
    }

    public function post_content(Request $request){
        if($request->isMethod('GET')){
            $content = $request->all();
//            var_dump($content);
//            exit;
            return view('report.content', compact('content'));
        }
        $content = $request->all();
        return view('admin_report.content', compact('content'));
    }

    public function post_comment(Request $request){
        $serveice = new \App\Services\TestService;
        $content = $serveice->reports_get();
        $content = $content['0'];
        $content['comment'] = $request->comment;

        return view('report.content', compact('content'));
    }
    //
}
