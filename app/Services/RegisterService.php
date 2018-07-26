<?php
    namespace App\Services;
//    use App\Models\Employee;
    class RegisterService{
        public function register($request){
            $name = $request->name;
            $birthday = $request->year.'-'.$request->month.'-'.$request->day;
            $id = date('Ymd').$request->year.$request->month.$request->day;
            \DB::table('employees')->insert(
                ['employee_number' => $id, 'name' => $name, 'birthday' => $birthday]
            );

            return;
        }

        public function get(){
            return \App\Models\Employee::all();
        }
    }