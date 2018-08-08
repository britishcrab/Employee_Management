<?php
    namespace App\Services;

    use App\Models\Report;

    class ReportService
    {

        protected $reports;

        function __construct()
        {
            $this->reports = new Report;
        }

        /**
         * @param $data
         * @return mixed
         * 日報の新規登録
         */
        public function create($data)
        {
            $create = new Report;
            $create->fill($data);
            $create->save();

            return;
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
         * @return Report[]|\Illuminate\Database\Eloquent\Collection
         * ログインしている従業員の日報の全件取得
         */
        public function fetch_all($employee_id)
        {
            $reports = Report::where('employee_id', $employee_id)->get();
            return $reports;
        }

        /**
         * @param $report_id
         * 指定されたreport_idのレコードを削除
         */
        public function delete($report_id)
        {
            $report = $this->fetch($report_id);
            $report->delete();

            return;
        }
    }