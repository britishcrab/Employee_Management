<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $service;

    function __construct()
    {
        $this->service = new \App\Services\ReportService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * レポートトップ画面表示
     */
    public function get_home()
    {
        return view('report.home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * レポート新規作成画面表示
     */
    public function get_create(){
        return view('report.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * dbに登録　-> 確認画面表示
     */
    public function post_create(Request $request){
        $report = $request->all();
        $report_id = $this->service->create($report);

        return redirect()->route('report.create.confirm.get', compact('report_id'));
    }

    public function get_create_confirm(){
        var_dump($id);
        exit;

        return view('report.create_confirm', compact('report_data'));
    }
//    public function get_create_confirm(){
//        $report_data = $_GET;
//        if(!isset($report_data['title'])){
//            $report_data['title'] ="default";
//        }
//        if(!isset($report_data['text'])){
//            $report_data['text'] ="default";
//        }
//
//        return view('report.create_confirm', compact('report_data'));
//    }

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
