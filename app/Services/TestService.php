<?php
    namespace App\Services;
//    use App\Models\Employee;
    class TestService
    {
        protected $employees = [
            ['employee_id' => '0001',
                'last_name' => '田中',
                'first_name' => '幸也',
                'mail' => 'aaa@gmail.com',
                'password' => 'password',
                'role'  => '社員'],
            ['employee_id' => '0002',
                'last_name' => '山田',
                'first_name' => '義明',
                'mail' => 'bbb@gmail.com',
                'password' => 'PASSWORD',
                'role'  => '役員'],
        ];
        protected $reports = [
            ['name' => '山田',
                'report_id' => '0001',
                'title' => '2018/06/28日報',
                'text' => '2018/06/28の日報を提出します。',
                'comment'  => '',
                'created_at' => '2018/06/28',
                'deleted_at'  => 'null'],
            ['name' => 'たなか',
                'report_id' => '0002',
                'title' => '2018/06/15日報',
                'text' => '2018/06/15の日報を提出します。',
                'comment'  => 'コメントコメントこめんと',
                'created_at' => '2018/06/15',
                'deleted_at'  => 'null'],
        ];
        public function employees_get(){
            return $this->employees;
        }

        public function reports_get(){

            return $this->reports;
        }
    }