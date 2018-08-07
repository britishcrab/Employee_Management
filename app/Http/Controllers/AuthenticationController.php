<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninPost;

class AuthenticationController extends Controller
{
    protected $auth_service;

    /**
     * AuthenticationController constructor.
     * EmployeeServiceのインスタンス化
     */
    function __construct()
    {
        $this->auth_service = new \App\Services\AuthenticationService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * ログイン画面の表示
     */
    public function getSignin()
    {
        return view('auth.signin');
    }

    /**
     * @param SigninPost $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * ログイン画面の入力値をAuthenticationServiceに投げて
     * パスワードとメールアドレスが一致すれば社員IDが帰ってくる
     */
    public function postSignin(SigninPost $request)
    {
        $input_data = $request->all();
        $check = $this->auth_service->Signin($input_data);
        if($check)
        {
            session(['employee_id' => $check]);
            return view('top');
        }else
        {
            return view('auth.signin', ['status' => '']);
        }
    }
}
