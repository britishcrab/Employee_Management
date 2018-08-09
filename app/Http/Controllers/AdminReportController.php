<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminReportService;
use App\Http\Requests\CommentPost;
use App\Services\EmployeeService;

class AdminReportController extends Controller
{
    protected $admin_report_service;
    protected $employee_service;

    function __construct()
    {
        $this->admin_report_service = new AdminReportService;
        $this->employee_service = new EmployeeService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 日報一覧表示
     */
    public function getList()
    {
        $reports = $this->admin_report_service->fetch_all();

        return view('admin_report.list', compact('reports'));
    }

    /**
     * @param $report_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 詳細画面表示
     */
    public function getContent($report_id){
        $content = $this->admin_report_service->fetch($report_id);
        return view('admin_report.content', compact('content'));
    }

    /**
     * @param CommentPost $request
     * @return \Illuminate\Http\RedirectResponse
     * report_idとcommentをセッションに格納して
     * getConfirmへリダイレクト
     */
    public function postComment(CommentPost $request){
        $comment = $request->all();
        session(['report_id' => $comment['report_id'], 'comment' => $comment['comment']]);
        return redirect()->route('admin_report.comment.confirm.get');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * コメントの確認画面表示
     */
    public function getConfirm()
    {
        $comment['report_id'] = session('report_id');
        $comment['employee_id'] = session('employee_id');
        $comment['comment'] = session('comment');
        return view('admin_report.comment_confirm', compact('comment'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 前画面で入力したコメントを保持したまま詳細画面表示
     */
    public function getModification()
    {
        $content = $this->admin_report_service->fetch(session('report_id'));
        $content['comment'] = session('comment');
        return view('admin_report.comment_modification', compact('content'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * getCompletionへリダイレクト
     */
    public function postConfirm(Request $request)
    {
        return redirect()->route('admin_report.comment.completion.get');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * commentsへ格納して完了画面表示
     */
    public function getCompletion()
    {
        var_dump(session()->all());
        exit;
        $comment['employee_id'] = session('employee_id');
        $comment['report_id'] = session('report_id');
        $comment['comment'] = session('comment');
        $this->admin_report_service->comment($comment);
        $name = $this->employee_service->fetch($comment['employee_id']);
        $mail = new \App\Http\Controllers\MailController;
        $mail->ComentMailSend();
        return view('admin_report.comment_completion');
    }
}
