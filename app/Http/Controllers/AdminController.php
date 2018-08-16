<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Http\Requests\EmployeeRegister;
 use App\Services\EmployeeService;
 use App\Services\RoleService;
 use App\Http\Requests\EmployeeUpdate;
 use App\Services\Session;
 use Illuminate\Support\Facades\Auth;

 class AdminController extends Controller
{
    protected $employee_service;
    protected $role_service;

    /**
     * AdminController constructor.
     * サービスクラスのインスタンス化
     */
    function __construct()
    {
        $this->employee_service = new EmployeeService;
        $this->role_service = new RoleService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 管理画面の表示
     */
	public function getHome()
    {
		return view('admin_employee.home');
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 自身のrole_idを取得
     * 自身のrole_idをsessionに格納
     * 自身のrole_idが１(管理者)なら全員の日報を取得
     * 自身のrole_idが２(役員)なら役員と社員の日報を取得
     * 一覧画面に渡して表示
     */
     public function getList()
     {
        $role_id = $this->employee_service->FetchRoleid(session('employee_id'));
        session(['my_role_id' => $role_id]);
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
	public function getDelete($id)
    {
		$employee = $this->employee_service->fetch($id);
	    return view('admin_employee.delete', compact('employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDelete(Request $request)
    {
		$this->employee_service->delete($request->id);
        return redirect()->route('admin.delete.completion');
    }

    public function getDeleteCompletion()
    {
        return view('admin_employee.delete_completion');
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUpdate($id=null)
    {
		$employee = $this->employee_service->fetch($id);
		return view('admin_employee.update', compact('employee'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdate(EmployeeUpdate $request)
    {
        $data = $request->all();
        $this->employee_service->update($data);
        $id = $data['id'];
        return redirect()->route('admin.update.confirm.get', compact('id'));
    }

     /**
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
    public function getUpdateConfirm($id)
    {
        $employee = $this->employee_service->fetch($id);

        return view('admin_employee.update_comfirm', compact('employee'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 従業員削除完了画面表示
     */
    public function getUpdateCompletion()
    {
        return view('admin_employee.update_completion');
    }
     /**
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      * 新規登録画面取得
      */
     public function getRegister ()
     {
        return view('admin_employee.register');
    }

     /**
      * @param Request $request
      * @return \Illuminate\Http\RedirectResponse
      * 入力値をセッションに格納して確認画面へリダイレクト
      */
//    public function postRegister (EmployeeRegister $request)
//    {
//        $request_data = $request->all();
//        $this->setSession($request_data);
//        return redirect()->route('admin.register.confirm.get');
//    }
     public function postRegister (EmployeeRegister $request)
     {
         $request_data = $request->all();
         Session::setSession($request_data);
         return redirect()->route('admin.register.confirm.get');
     }

     /**
      * @param $employee
      * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
      * セッションから値を取り出して
      * 確認画面の表示
      */
    public function getRegisterConfirm (){
        $array = ['last_name', 'first_name', 'birthday', 'mail', 'password', 'role_id'];
        $new_employee = Session::setArray($array);
        $new_employee['role_name'] = $this->role_service->FetchRoleName($new_employee['role_id']);
        return view('admin_employee.register_confirm', compact('new_employee'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * getRegisterCompletionにリダイレクト
     */
    public function postRegisterConfirm()
    {
        return redirect()->route('admin.register.completion.get');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * dbに登録して完了画面表示
     */
    public function getRegisterCompletion()
    {
        $array = ['last_name', 'first_name', 'birthday', 'mail', 'password', 'role_id'];
        $new_employee = Session::setArray($array);
        Session::deleteSession($array);
        $this->employee_service->create($new_employee);
        return view('admin_employee.register_completion');
    }
}
