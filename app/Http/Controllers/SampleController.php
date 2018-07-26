<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function employeetest(){

        $id = rand(0003, 9999);

        \DB::table('employees')->insert(
            ['employee_number' => $id, 'name' => 'sample tarou', 'birthday' => '1000-01-01']
        );

//        $employees = \DB::table('employees')->get();

//        var_dump($employees);
    }

    public function roletest(){
//        \DB::table('roles')->insert([
//            ['role_name' => '社長'],
//            ['role_name' => '部長'],
//            ['role_name' => '課長'],
//            ['role_name' => '会長'],
//            ['role_name' => '係長']
//        ]);

        $role = \DB::table('roles')->get();

        var_dump($role);
    }

    public function employeeroletest(){

        \DB::table('employee_role')->insert(
            ['employee_id' => 1, 'role_id' => '3']
        );

        $sample = \App\Models\Employee::find(1);

        foreach($sample->roles as $role){
//            var_dump($role);
            $role_name = $role->role_name;
            echo $role_name. '<br>';
        }
    }

    public function languagetest(){

        $this->employeetest();

        \DB::table('languages')->insert([
            ['language' => 'php'],
            ['language' => 'c++'],
            ['language' => 'C#'],
            ['language' => 'scala'],
            ['language' => 'Phython']
        ]);
        $a = rand(1, 3);
        \DB::table('employee_language')->insert(
            ['employee_id' => 1, 'language_id' => $a]
        );

        $sample = \App\Models\Employee::find(1);
        var_dump($sample->languages);

        foreach($sample->languages as $language){
            $a = $language->language;
            echo $a. '<br>';
        }
    }
    //
}
