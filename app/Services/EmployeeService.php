<?php
    namespace App\Services;
//    use App\Models\Employee;
    class EmployeeService
    {
        public function fetch_all(){
            return \App\Models\Employee::all();
        }
    }