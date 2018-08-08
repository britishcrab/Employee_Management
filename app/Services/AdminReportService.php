<?php
    namespace App\Services;

    use App\Models\Report;

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
    }