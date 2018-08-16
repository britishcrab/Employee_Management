<?php
namespace App\Services;

use App\Models\Report;
use App\Models\Comment;

class AdminReportService
{
    /**
     * @return Report[]|\Illuminate\Database\Eloquent\Collection
     * 日報の全件取得
     * 登録日の降順にソート
     *
     */
    public function fetch_all()
    {
        $reports = Report::orderBy('created_at','ASC')->get();
        return $reports;
    }

    /**
     * @param $role_id
     * @return mixed
     * 引数の役職以下のレポートを全件取得する
     */
    public function FetchPart($role_id)
    {
        $reports = Report::wherehas('Employee', function($q) use ($role_id) {
            $q->where('role_id', '>=', "$role_id");
        })->orderBy('created_at', 'ASC')->get();
        return $reports;
    }

    /**
     * @param $id
     * @return mixed
     * 指定されたreport_idの日報の取得
     */
    public function fetch($report_id)
    {
        return Report::find($report_id);
    }

    /**
     * @param $comment
     * commentの新規登録
     */
    public function setComment($comment)
    {
        $create = new Comment;
        $create->fill($comment);
        $create->save();
        return;
    }
}