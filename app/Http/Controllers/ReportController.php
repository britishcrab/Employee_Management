<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Services\ReportService;
use App\Http\Requests\ReportPost;

class ReportController extends Controller
{
    protected $report_service;
    protected $employee_service;

    /**
     * ReportController constructor.
     * EmployeeServiceのインスタンス化
     */
    function __construct()
    {
        $this->report_service = new ReportService;
        $this->employee_service = new EmployeeService;
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
    public function get_create($status = null){
        if(isset($status))
        {
            $rerurn_data['employee_id'] = $value = session('employee_id');
            $rerurn_data['title'] = $value = session('title');
            $rerurn_data['content'] = $value = session('content');
            $rerurn_data['created_at'] = $value = session('created_at');
            return view('report.create', compact('rerurn_data'));
        }
        return view('report.create');
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * セッションに格納　-> get_create_confirm()へリダイレクト
     */
//    public function post_create(Request $request){
//        $id = $request->session()->get('employee_id');
//        $report = $request->all();
//        $report['employee_id'] = $id;
//        $report_id = $this->report_service->create($report);
//
//        return redirect()->route('report.create.confirm.get', compact('report_id'));
//    }
    public function post_create(ReportPost $request){
        $report = $request->all();
        session(['title' => $report['title'], 'content' => $report['content'], 'created_at' => $report['created_at']]);
        return redirect()->route('report.create.confirm.get');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 確認画面表示
     */
//    public function get_create_confirm(){
//        $report = session()->all();
//        return view('report.create_confirm', compact('report'));
//    }
    public function get_create_confirm(){
        $report['employee_id'] = $value = session('employee_id');
        $report['title'] = $value = session('title');
        $report['content'] = $value = session('content');
        $report['created_at'] = $value = session('created_at');

        return view('report.create_confirm', compact('report'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * dbに登録して完了画面へ
     */
//    public function post_create_send(Request $request){
//        $create_data = $request->all();
//        if(isset($create_data['send'])) {
//            return redirect()->route('report.create.done.get');
//        }else{
//            return view('report.create', compact('create_data'));
//        }
//    }
    public function post_create_confirm(Request $request){
        return redirect()->route('report.create.completion.get');
    }



    public function get_create_completion(){
        $report['employee_id'] = $value = session('employee_id');
        $report['title'] = $value = session('title');
        $report['content'] = $value = session('content');
        $report['created_at'] = $value = session('created_at');
        $this->report_service->create($report);

        return view('report.create_completion');
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
