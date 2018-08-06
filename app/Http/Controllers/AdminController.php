<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $service;

    /**
     * AdminController constructor.
     */
    function __construct()
    {
        $this->service = new \App\Services\EmployeeService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function get_home(Request $request)
    {
		return view('admin_employee.home', $request);
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function get_list()
    {
		$employees = $this->service->fetch_all();
		return view('admin_employee.list', compact('employees'));
	}

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function get_delete($id)
    {
		$employee = $this->service->fetch($id);
	    return view('admin_employee.delete', compact('employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post_delete(Request $request)
    {
		$this->service->delete($request->id);
        return redirect()->route('admin.get.list');
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        $this->service->update($data);
        $id = $data['id'];
        return redirect()->route('admin.update.confirm.get', compact('id'));
    }

     /**
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
    public function get_update_confirm($id)
    {
        $employee = $this->service->fetch($id);

        return view('admin_employee.update_comfirm', compact('employee'));
    }

    public function get_update_completion()
    {
        return view('admin_employee.update_completion');
    }
     /**
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      * 新規登録画面取得
      */
     public function get_register ()
     {
        return view('admin_employee.register');
    }

     /**
      * @param Request $request
      * @return \Illuminate\Http\RedirectResponse
      * 新規登録して確認画面へリダイレクト
      */
     public function post_register (Request $request)
     {
         $data = $request->all();
         $create = $this->service->create($data);
         $id = $create;
         return redirect()->route('admin.register.confirm.get', compact('id'));
     }

     /**
      * @param $employee
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      * 確認画面の表示
      */
     public function get_register_confirm (){
        $employee = $this->service->fetch($_GET['id']);
         return view('admin_employee.register_confirm', compact('employee'));
     }
}
