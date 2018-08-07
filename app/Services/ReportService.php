<?php
    namespace App\Services;

    use App\Models\Report;

    class ReportService
    {
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
         * 指定されたIDの日報の取得
         */
        public function fetch($id)
        {
            return Report::find($id);
        }
    }