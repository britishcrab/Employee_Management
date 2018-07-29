<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	public function admin(){
		return view('employee.admin');
	}

	public function employee_list(){
		$samples = [
			['employee_id' => '0001',
			'name' => '田中',
			'role'  => '社員'],  
			['employee_id' => '0002',
			'name' => '山田',
			'role'  => '役員'],  
		];

		return view('employee.employee_list', compact('samples'));
	}

	public function admin(){
		return view('employee.admin');
	}
}
