<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $employee_list = [
        ['employee_id' => '0001',
            'last_name' => '田中',
            'first_name' => '幸也',
            'role'  => '社員'],
        ['employee_id' => '0002',
            'last_name' => '山田',
            'first_name' => '義明',
            'role'  => '役員'],
    ];
    protected $reports = [
        ['report_id' => '0001',
            'title' => '2018/06/28日報',
            'text' => '2018/06/28の日報を提出します。',
            'comment'  => '',
            'created_at' => '2018/06/28',
            'deleted_at'  => 'null'],
        ['report_id' => '0002',
            'title' => '2018/06/15日報',
            'text' => '2018/06/15の日報を提出します。',
            'comment'  => 'コメントコメントこめんと',
            'created_at' => '2018/06/15',
            'deleted_at'  => 'null'],
    ];

    public function get_home(){
        return view('report.home');
    }

    public function get_create(){
        return view('report.create');
    }

    public function post_create(Request $request){
        $request_data = $request->all();

        return redirect()->route('report.create.confirm.get', $request_data);
    }

    public function get_create_confirm(){
        $report_data = $_GET;
        if(!isset($report_data['title'])){
            $report_data['title'] ="default";
        }
        if(!isset($report_data['text'])){
            $report_data['text'] ="default";
        }

        return view('report.create_confirm', compact('report_data'));
    }

    public function post_create_send(Request $request){
        $create_data = $request->all();
        if(isset($create_data['send'])) {
            return redirect()->route('report.create.done.get');
        }else{
            return view('report.create', compact('create_data'));
        }
    }

    public function get_create_done(){
        return view('report.create_done');
    }

    public function get_list(){
        $reports = $this->reports;

        return view('report.list', compact('reports'));
    }
    public function post_content(Request $request){
        $content = $request->all();
        if(isset($_POST['delete'])){
            return view('report.delete', compact('content'));
        }
        return view('report.content', compact('content'));
    }

    public function post_delete(){
        return redirect()->route('report.delete.done.get');
    }

    public function get_delete_done(){
        return view('report.delete_done');
    }
    //
}
