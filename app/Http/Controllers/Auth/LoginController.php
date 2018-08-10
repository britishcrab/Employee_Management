<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
        $this->middleware('guest:original')->except('logout');
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

    public function getLoginForm(Request $request, $page_id)
    {
        return view('signin')
    }

    public function authenticate(Request $request)
    {
        $request_data = $request->all();
        $mail = $request_data['mail'];
        $password = $request_data['password'];

        if (Auth::guard('original')
            ->attempt(['mail' => $mail, 'password' => $password])) {
            logger('認証成功！');
            return redirect()->route('top');
        } else {
            logger('認証失敗');
            return redirect()->route('signin');
        }
    }
}