<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;

class AdminController extends Controller
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

	public function get_home(Request $request){
		return view('employee.home', $request);
	}

	public function get_list(){
		$samples = $this->samples;

		return view('employee.list', compact('samples'));
	}
//
//	public function get_delete(Request $request){
//	    return view('employee.delete');
//    }

    public function post_delete(){
        return redirect()->route('admin.get.list');
    }

    public function get_update(Request $request){
        if(isset($_POST['update'])){
            return view('employee.update');
        }
        else{
            return view('employee.delete');
        }
    }

    public function post_update(Request $request){
        return redirect()->route('admin.get.update.confirm', compact('request'));
    }

    public function get_update_confirm(Request $request){
        $isrequest = $request;
        return view('employee.update_comfirm', compact('isrequest'));
    }
}
