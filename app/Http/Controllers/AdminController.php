<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $service;

    function __construct(){
        $this->service = new \App\Services\EmployeeService;
    }

	public function get_home(Request $request){
		return view('admin_employee.home', $request);
	}

	public function get_list(){
		$employees = $this->service->fetch_all();

		return view('admin_employee.list', compact('employees'));
	}

	public function get_delete($id){
		$employee = $this->service->fetch($id);

	    return view('admin_employee.delete', compact('employee'));
   }

    public function post_delete(Request $request){
		$employee = $this->service->delete($request->id);

        return redirect()->route('admin.get.list');
    }

    public function get_update($id){
		$employee = $this->service->fetch($id);

		return view('admin_employee.update', compact('employee'));
    }
    // public function get_update(Request $request){
    //     if(isset($_POST['update'])){
    //         return view('admin_employee.update');
    //     }
    //     else{
    //         return view('admin_employee.delete');
    //     }
    // }

    public function post_update(Request $request){
        return redirect()->route('admin.get.update.confirm', compact('request'));
    }

    public function get_update_confirm(Request $request){
        $request_data = $request;
        return view('admin_employee.update_comfirm', compact('request_data'));
    }
}
