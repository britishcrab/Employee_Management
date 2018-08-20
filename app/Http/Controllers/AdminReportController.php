<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminReportService;
use App\Http\Requests\CommentPost;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendReminderEmail;

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
        session()->forget('comment');
        $role_id = Auth::guard('original')->user()->role_id;
        if ($role_id == 1)
        {
            $reports = $this->admin_report_service->fetch_all();
        }elseif ($role_id == 2)
        {
            $reports = $this->admin_report_service->FetchPart($role_id);
        }

        foreach ($reports as $report)
        {
            if(empty($report->employee))
            {
                $report['is_employee'] = '削除されました';
            }
        }
        return view('admin_report.list', compact('reports'));
    }

    /**
     * @param $report_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 詳細画面表示
     */
    public function getContent($report_id){
        $content = $this->admin_report_service->fetch($report_id);
        $content['comment'] = session('comment');
        if(empty($content->employee))
        {
            $content['is_employee'] = '削除されました';
        }
        $report_employee = $content->employee_id;
        session(['$report_employee' => $report_employee]);
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
        session([
            'report_id'  => $comment['report_id'],
            'comment'    => $comment['comment'],
        ]);
        return redirect()->route('admin_report.comment.confirm.get');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * コメントの確認画面表示
     */
    public function getConfirm()
    {
        $comment = [
            'report_id'   => session('report_id'),
            'comment'     => session('comment')
        ];
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
     * commentsへ格納
     * -> 自身の名前取得
     * -> 日報の作成者のメールアドレス取得
     * -> 日報の作成者にコメントがついた旨のメール送信
     * -> 完了画面表示
     */
    public function getCompletion()
    {
        $comment = [
            'report_id'   => session()->pull('report_id', 'default'),
            'comment'     => session()->pull('comment', 'default'),
            'employee_id' => Auth::guard()->user()->id,
        ];
        $this->admin_report_service->setComment($comment);
        $sender = $this->employee_service->fetch(Auth::guard('original')->user()->id);
        $sender_name = $sender->last_name;
        $report_employee = $this->employee_service->fetch(session()->pull('$report_employee'), 'default');
        $mail_to = $report_employee->mail;
        SendReminderEmail::dispatch($sender_name, $mail_to);
        return view('admin_report.comment_completion');
    }
}
