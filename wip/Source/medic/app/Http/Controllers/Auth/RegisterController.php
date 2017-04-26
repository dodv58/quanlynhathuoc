<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function store()
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'account' => request('account'),
                'address' => request('address'),
                'phone' => request('phone'),
                'password' => bcrypt(request('password')),
                'role' => 1
            ]);

            DB::commit();
            auth()->login($user);
        }
        catch (\Exception $ex){
            DB::rollBack();
            throw $ex;
        }
        return redirect('pharmacy-register');
    }

    public function create(){
        return view('auth/register');
    }
}
