<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\SigninPost;
use App\Services\AuthenticationService;

class AuthenticationController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * AuthenticatesUsersのlogin()で
     * attemptLoginでサインイン処理を行う
     * 成功すればsendLoginResponse()でリダイレクトされる
     * sendFailedLoginResponse失敗すればで例外を投げられる
     */
    public function postSignin(SigninPost $request)
    {
        return $this->login($request);
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
     * @return array
     * attemptLogin()で認証に用いる値を抽出している
     * (mailとpassword)
     */
    protected function credentials(Request $request)
    {
        return $request->only('mail', 'password');
    }

    public function username()
    {
        return 'mail';
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
        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('signin');
    }
}
