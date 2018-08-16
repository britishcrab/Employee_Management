<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EmployeeService;
use App\Services\ReportService;
use App\Services\CommentService;
use App\Http\Requests\ReportPost;
use App\Http\Controllers\SessionController;

class ReportController extends Controller
{
    protected $report_service;
    protected $employee_service;
    protected $comment_service;

    /**
     * ReportController constructor.
     * EmployeeServiceのインスタンス化
     */
    function __construct()
    {
        $this->report_service = new ReportService;
        $this->employee_service = new EmployeeService;
        $this->comment_service = new CommentService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * レポートトップ画面表示
     */
    public function getHome()
    {
        $role_id = Auth::guard('original')->user()->role_id;
        if ($role_id == 3)
        {
            $sidebars = ['サインアウト' => 'signout'];
        }else
        {
            $sidebars = ['トップ' => 'top', 'サインアウト' => 'signout'];
        }
        return view('report.home', compact('role_id', 'sidebars'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * レポート新規作成画面表示
     */
    public function getCreate()
    {
        return view('report.create');
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * セッションに格納　-> get_create_confirm()へリダイレクト
     */
    public function postCreate(ReportPost $request){
        $report = $request->all();
        SessionController::setSession($report);
        return redirect()->route('report.create.confirm.get');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 確認画面表示
     */
    public function getCreateConfirm()
    {
        $array = ['employee_id', 'title', 'content', 'created_at'];
        $report = SessionController::setArray($array);
        return view('report.create_confirm', compact('report'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * get_create_completionへリダイレクト
     */
    public function postCreateConfirm()
    {
        return redirect()->route('report.create.completion.get');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日報の修正画面へ遷移
     */
    public function getModification()
    {
        $array = ['employee_id', 'title', 'content', 'created_at'];
        $rerurn_data = SessionController::setArray($array);
            return view('report.modification', compact('rerurn_data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日報作成完了画面表示
     */
    public function getCreateCompletion()
    {
        $array = ['employee_id', 'title', 'content', 'created_at'];
        $report = SessionController::setArray($array);

        $this->report_service->create($report);

        return view('report.create_completion');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日報一覧画面表示
     */
    public function getList()
    {
        $employee_id = Auth::guard('original')->user()->id;
        $reports = $this->report_service->fetch_all($employee_id);
        $session_errer = session()->pull('error', 'default');
        if($session_errer == 'iscomment')
        {
            $msg = 'コメントが存在するため削除できません';
            return view('report.list', compact('reports', 'msg'));
        }
        return view('report.list', compact('reports'));
    }

    /**
     * @param $report_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日報詳細表示
     */
    public function getCcontent($report_id)
    {
        $content = $this->report_service->fetch($report_id);
        $is_comment = $this->comment_service->isComment($report_id);
        $content['is_comment'] = $is_comment;
        return view('report.content', compact('content'));
    }

    /**
     * @param $report_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日報削除画面表示
     */
    public function getDelete($report_id)
    {
        $iscomment = $this->comment_service->isComment($report_id);
        if ($iscomment)
        {
            session(['error' => 'iscomment']);
            return redirect()->route('report.list.get');
        }
        $content = $this->report_service->fetch($report_id);
        return view('report.delete', compact('content'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * report_idをセッションに格納して
     * getDeleteCompletionにリダイレクト
     */
    public function postDelete(Request $request)
    {
        $report_id = $request->report_id;
        session(['report_id' => $report_id]);
        return redirect()->route('report.delete.completion.get');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日報削除完了画面表示
     */
    public function getDeleteCompletion()
    {
        $report_id = session('report_id');
        $this->report_service->delete($report_id);
        return view('report.delete_completion');
    }
}
