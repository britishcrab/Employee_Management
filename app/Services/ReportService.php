<?php
    namespace App\Services;

    use App\Models\Report;

    class ReportService
    {
        /**
         * @param $data
         * @return mixed
         */
        public function create($data)
        {
            $create = new Report;
            $create->fill($data);
            $create->save();

            return $create->id;
        }
    }