<?php

namespace WebSisMap\Http\Controllers\Operator\Auth;

use Illuminate\Http\Request;
use WebSisMap\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use WebSisMap\Models\User;

class LoginOperController extends Controller
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
    protected $redirectTo = 'operator/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $data['role'] = User::ROLE_OPERADOR;
        return $data;
    }

    public function showLoginForm()
    {
        return view('operator.auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
