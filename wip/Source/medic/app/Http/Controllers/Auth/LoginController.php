<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Override to change authentication column.
     *
     * @return string
     */
    public function username() {
        return 'account';
    }


    public function showLoginView(){
        return view('auth/login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }

    public function login(){
        if(! auth()->attempt(request(['account', 'password']))){
            if(!User::where('account', request('account'))->first()){
                return back()->withInput()->withErrors(['account' => 'Tài khoản không tồn tại!']);
            }
            else {
                return back()->withInput()->withErrors(['password' => 'Sai mật khẩu!']);
            }

        }
        return redirect()->home();
    }
}
