<?php
namespace App\Services;

use App\Models\Report;
use App\Models\Comment;

class AdminReportService
{
    /**
     * @return Report[]|\Illuminate\Database\Eloquent\Collection
     * 日報の全件取得
     */
    public function fetch_all()
    {
        return Report::all();
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
    public function Comment($comment)
    {
        $create = new Comment;
        $create->fill($comment);
        $create->save();
        return;
    }


    public function test($report_id)
    {

        $report = new Report;
        var_dump($report);
        exit;
    }
}