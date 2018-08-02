<?php
    namespace App\Services;
//    use App\Models\Employee;
    class EmployeeService
    {
        public function fetch_all(){
            return \App\Models\Employee::all();
        }

        public function fetch($id){
            return \App\Models\Employee::find($id);
        }

        public function delete($id){
            $employee = \App\Models\Employee::find($id);
			$employee->delete();

			return;
        }
    }