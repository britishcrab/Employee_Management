<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminReportService;

class AdminReportController extends Controller
{
    protected $admin_report_service;

    function __construct()
    {
        $this->admin_report_service = new AdminReportService;
    }

    public function getList()
    {
        $reports = $this->admin_report_service->fetch_all();

        return view('admin_report.list', compact('reports'));
    }

    public function getContent($report_id){
        $content = $this->admin_report_service->fetch($report_id);
        return view('admin_report.content', compact('content'));
//        if($request->isMethod('GET')){
//            $content = $request->all();
////            var_dump($content);
////            exit;
//            return view('report.content', compact('content'));
//        }
//        $content = $request->all();
//        return view('admin_report.content', compact('content'));
    }

    public function postComment(Request $request){
        $comment = $request->all();
        session(['report_id' => $comment['report_id'], 'comment' => $comment['comment']]);
        return redirect()->route('admin_report.comment.confirm.get');


        $serveice = new \App\Services\TestService;
        $content = $serveice->reports_get();
        $content = $content['0'];
        $content['comment'] = $request->comment;

        return view('report.content', compact('content'));
    }

    public function getConfirm()
    {
        $comment['report_id'] = $value = session('report_id');
        $comment['employee_id'] = $value = session('employee_id');
        $comment['comment'] = $value = session('comment');

        return view('admin_report.comment_confirm', compact('comment'));
    }
}
