<?php
namespace App\Services\Authentication;
use Illuminate\Http\Request;
trait Authentication
{
    /**
     * @return string
     * リダイレクト先の指定
     */
    protected function redirectPath()
    {
        return route('top');
    }
    public function postSignin(SigninPost $request)
    {
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
    }
    /**
     * @param Request $request
     * @return mixed
     * ログインしているかどうかの確認
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }
    /**
     * @param Request $request
     * @return mixed
     * $requestからmailとpasswordのみ取り出す
     */
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
}