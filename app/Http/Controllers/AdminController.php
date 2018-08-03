<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $service;

    function __construct()
    {
        $this->service = new \App\Services\EmployeeService;
    }

	public function get_home(Request $request)
    {
		return view('admin_employee.home', $request);
	}

	public function get_list()
    {
		$employees = $this->service->fetch_all();
		return view('admin_employee.list', compact('employees'));
	}

	public function get_delete($id)
    {
		$employee = $this->service->fetch($id);
	    return view('admin_employee.delete', compact('employee'));
    }

    public function post_delete(Request $request)
    {
		$employee = $this->service->delete($request->id);
        return redirect()->route('admin.get.list');
    }

    public function get_update($id=null)
    {
		$employee = $this->service->fetch($id);
		return view('admin_employee.update', compact('employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post_update(Request $request)
    {
        $data = $request->all();
        $update = $this->service->update($data);
        return redirect()->route('admin.get.update.confirm', compact('update'));
    }
//    public function post_update(Request $request){
//        return redirect()->route('admin.get.update.confirm', compact('request'));
//    }

    public function get_update_confirm()
    {
        $employees = $this->service->fetch_all();

        return view('admin_employee.list', compact('employees'));
    }

//     public function get_update_confirm(Request $request){
//         $request_data = $request;
//         return view('admin_employee.update_comfirm', compact('request_data'));
//     }

     public function get_register (){
        $last_id = $this->service->lastInsertId();
        var_dump($last_id);
        $next_id = ++$last_id;
        return view('admin_employee.register', compact(next_id));
    }
}
