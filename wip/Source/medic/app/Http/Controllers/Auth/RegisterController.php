<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\Models\Pharmacy;
use App\Models\SubPharmacy;

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
//        dd(request()->all());
        try {
            DB::beginTransaction();

            $pharmacy = Pharmacy::create([
                'name' => request('pharmacy-name'),
                'email' => request('email'),
                'account' => request('account'),
                'address' => request('pharmacy-address'),
                'phone' => request('pharmacy-phone'),
                'owner_name' => request('name')
            ]);

            $user = User::create([
                'pharmacy_id' => $pharmacy->id,
                'name' => request('name'),
                'email' => request('email'),
                'account' => request('account'),
                'address' => request('address'),
                'phone' => request('phone'),
                'password' => bcrypt(request('password')),
                'role' => 1
            ]);

            auth()->login($user);

            $sub_pharmacy = SubPharmacy::create([
                'name' => $pharmacy->name,
                'pharmacy_id' => $pharmacy->id,
                'address' => request('pharmacy-address'),
                'phone' => request('pharmacy-phone')
            ]);

            DB::commit();

            auth()->user()->pharmacy_id = $pharmacy->id;
            auth()->user()->sub_pharmacy_id = $sub_pharmacy->id;
            auth()->user()->save();

        }
        catch (\Exception $ex){
            DB::rollBack();
            throw $ex;
        }



        return redirect()->home();

    }

    public function create(){
        return view('auth/register');
    }
}
