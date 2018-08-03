<?php
    namespace App\Services;

    use App\Models\Employee;

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

        /**
         * @param $data
         */
        public function update($data){
            $employee = $this->fetch($data['id']);
            $employee->fill($data);
            $employee->save();

            $employee = $this->fetch($data['id']);
            return;
        }

        public function lastInsertId(){
            return \DB::getPdo()->lastInsertId();
        }
    }