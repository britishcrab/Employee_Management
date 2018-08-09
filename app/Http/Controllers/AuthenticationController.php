<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninPost;
use App\Services\AuthenticationService;

class AuthenticationController extends Controller
{
    protected $auth_service;

    /**
     * AuthenticationController constructor.
     * EmployeeServiceのインスタンス化
     */
    function __construct()
    {
        $this->auth_service = new AuthenticationService;
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
     * パスワードとメールアドレスが一致すれば社員IDが返ってくる
     */
    public function postSignin(SigninPost $request)
    {
        $input_data = $request->all();
        $check = $this->auth_service->Signin($input_data);
        if($check)
        {
            session()->regenerate();
            session(['employee_id' => $check, 'signin' => 1]);
            return view('top');
        }else
        {
            return view('auth.signin', ['status' => '']);
        }
    }

    public function getSignout()
    {
        return view('auth.signout');
    }

    public function postSignout()
    {
        session()->flush();
        return redirect()->route('signin');
    }
}
