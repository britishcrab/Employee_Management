<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $samples = [
        ['employee_id' => '0001',
        'last_name' => '田中',
        'first_name' => '幸也',
        'role'  => '社員'],
        ['employee_id' => '0002',
        'last_name' => '山田',
        'first_name' => '義明',
        'role'  => '役員'],
    ];

	public function admin(){
		return view('employee.admin');
	}

	public function employee_list(){
		$samples = $this->samples;

		return view('employee.employee_list', compact('samples'));
	}

	public function employee_delete(){
	    return view('employee.employee_delete');
    }

    public function employee_update(Request $employee_data){
        return view('employee.employee_update');
    }
}
