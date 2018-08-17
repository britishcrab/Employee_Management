<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninPost;
use App\Services\AuthenticationService;

use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        if (isset($_GET['status']))
        {
            $msg = "サインインに失敗しました";
            return view('auth.signin', compact('msg'));
        }
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
        if ($this->attemptLogin($request))
        {
            return $this->sendLoginResponse($request);
        }
        else
        {
            return redirect()->route('signin', ['status' => '']);
        }
    }
    protected function redirectPath()
    {
        return route('top');
    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }
    protected function credentials(Request $request)
    {
        return $request->only('mail', 'password');
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }





    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSignout()
    {
        return view('auth.signout');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignout()
    {
        session()->flush();
        return redirect()->route('signin');
    }

    protected function guard()
    {
        return Auth::guard('original');
    }

    public function original()
    {
        if(Auth::guard('original')->check()){
            $user = Auth::guard('original')->user();
        }
        return redirect()->route('signin');
    }
}
