<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninPost;
use App\Services\AuthenticationService;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
//    use \App\Services\Authentication\Authentication;
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

    /**
     * @param Request $request
     * signinに失敗した場合に例外を投げる
     *ValidationException::withMessages()は引数のkeyとvalueをforeachでループして
     * $validator->errors()->add($key, $value)の形で例外を投げる
     * 受け取る側は$errors->first('key')の方で受け取れる
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'signin_error' => [trans('auth.failed')],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * signout画面表示
     */
    public function getSignout()
    {
        return view('auth.signout');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * $this->guard()->logout();でsession,cookieのRememberTokenの削除,dbにRememberTokenが登録されていれば書き換えを行う
     * $request->session()->invalidate();でsessionの破棄
     * リダイレクト先へリダイレクト
     */
    public function postSignout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

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
