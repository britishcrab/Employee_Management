<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninPost;
use App\Services\AuthenticationService;
use Illuminate\Validation\ValidationException;

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
        return view('auth.signin');
    }

    /**
     * @param SigninPost $request
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws ValidationException
     * attemptLoginでサインイン処理を行う
     * 成功すればsendLoginResponse成功すれば()でリダイレクトされる
     * sendFailedLoginResponse失敗すればで例外を投げられる
     */
    public function postSignin(SigninPost $request)
    {
        if ($this->attemptLogin($request))
        {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @return string
     * sendLoginResponse()でログイン後のリダイレクト先の指定
     */
    protected function redirectPath()
    {
        return route('top');
    }

    /**
     * @param Request $request
     * @return mixed
     * guard()でプロバイダを取得
     * ->その中でconfig/auth.phpの中で指定したdriverとmodelが適応される
     * 　()の中を指定しなければdefaultの値が指定される(今回はdefaultを変更している)
     * attemptが認証　メソッドはSessionGuardに実装されている
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }

    /**
     * @param Request $request
     * @return array
     * attemptLogin()で認証に用いる値を抽出している
     * (mailとpassword)
     */
    protected function credentials(Request $request)
    {
        return $request->only('mail', 'password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * regenerateでsessionIDを再発行
     * clearLoginAttemptsでスロットル処理のクリアを実施
     * authenticated()に指定がなければredirectPath()にリダイレクト
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'signin_error' => [trans('auth.failed')],
        ]);
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
