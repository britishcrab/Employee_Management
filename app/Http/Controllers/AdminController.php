<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Http\Requests\EmployeeRegister;
 use \App\Services\EmployeeService;

class AdminController extends Controller
{
    protected $employee_service;

    /**
     * AdminController constructor.
     */
    function __construct()
    {
        $this->employee_service = new EmployeeService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function get_home()
    {
		return view('admin_employee.home');
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function get_list()
     {
        $role_id = $this->employee_service->FetchRoleid(session('employee_id'));
        switch ($role_id)
        {
            case 1:
                $employees = $this->employee_service->FetchAll();
                break;
            case 2:
                $employees = $this->employee_service->FetchRestrict(2, 3);
                break;
        }
         return view('admin_employee.list', compact('employees'));
     }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function get_delete($id)
    {
		$employee = $this->employee_service->fetch($id);
	    return view('admin_employee.delete', compact('employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post_delete(Request $request)
    {
		$this->employee_service->delete($request->id);
        return redirect()->route('admin.delete.completion');
    }

    public function get_delete_completion()
    {
        return view('admin_employee.delete_completion');
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_update($id=null)
    {
		$employee = $this->employee_service->fetch($id);
		return view('admin_employee.update', compact('employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post_update(Request $request)
    {
        $data = $request->all();
        $this->employee_service->update($data);
        $id = $data['id'];
        return redirect()->route('admin.update.confirm.get', compact('id'));
    }

     /**
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
    public function get_update_confirm($id)
    {
        $employee = $this->employee_service->fetch($id);

        return view('admin_employee.update_comfirm', compact('employee'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 従業員削除完了画面表示
     */
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
     public function post_register (EmployeeRegister $request)
     {
         $data = $request->all();
         $create = $this->employee_service->create($data);
         $id = $create;
         return redirect()->route('admin.register.confirm.get', compact('id'));
     }

     /**
      * @param $employee
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      * 確認画面の表示
      */
     public function get_register_confirm (){
        $employee = $this->employee_service->fetch($_GET['id']);
         return view('admin_employee.register_confirm', compact('employee'));
     }

    public function get_register_completion()
    {
        return view('admin_employee.register_completion');
    }
}
