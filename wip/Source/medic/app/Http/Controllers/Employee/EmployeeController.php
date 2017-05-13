<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SubPharmacy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    //

    protected $redirectTo = '/login';


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['checkEmployeeExisted']]);
    }

    public function employee()
    {

        $users = User::where('pharmacy_id', auth()->user()->pharmacy_id)->get();

        return view('employee', compact('users'));
    }

    public function addEmployee() {
        return view('employee_add');
    }

    public function storeEmployee() {
        $user = User::where('account', request('account'))->first();
        try {
            DB::beginTransaction();
            if (!$user) {
                $newUser = new User;
                $newUser->pharmacy_id = auth()->user()->pharmacy_id;
                $newUser->sub_pharmacy_id = \request('agency');
                $newUser->account = request('account');
                $newUser->email = request('email');
                $newUser->birthday = \request('birthday');
                $newUser->password = bcrypt("123456");
                $newUser->name = request('name');
                $newUser->address = request('address');
                $newUser->phone = request('phone');
                if (request('role') == 'manager') {
                    $newUser->role = 1;
                } else {
                    $newUser->role = 2;
                }


                $newUser->save();
            }
            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollBack();
            throw $ex;
        }


        return redirect('/employee');
    }

    public function editEmployee($account) {
        if(auth()->user()->role != 1) {
            return redirect()->home();
        }
//        $user = new User;
        $user = User::where('account', $account)->first();

        return view('employee_edit', compact('user'));
    }

    public function deleteEmployee($account){
        if(auth()->user()->role != 1) {
            return redirect()->home();
        }
        User::where('account', $account)->delete();
        return redirect('/employee');
    }

    public function updateEmployee($account){
        if(auth()->user()->role != 1) {
            return redirect()->home();
        }
        $user = User::where('account', $account)->first();
//        dd(\request()->all());
        if($user) {
            $user->sub_pharmacy_id = request('agency');
            $user->birthday = \request('birthday');
            $user->address = request('address');
            $user->phone = request('phone');
            $user->birthday = \request('birthday');
            if (request('role') == "manager") {
                $user->role = 1;
            } else {
                $user->role = 2;
            }
            $user->save();
        }
        return redirect('/employee');
    }

    public function checkEmployeeExisted(Request $request){

        if(User::where('account', $request->txt)->first()) {
            return 1;
        }
        return 0 ;

    }

    public function showProfile(){
        $user = auth()->user();

        return view('employee_edit', compact('user'));
    }

    public function showUpdatePasswordForm() {
        return view('employee/update_password');
    }

    public function updatePassword(){
//        dd(\request()->all());
        try{
            DB::beginTransaction();
            $user = auth()->user();
            if(Hash::check(\request('current_password'), $user->getAuthPassword())){
                $user->password = bcrypt(\request('new_password'));
                $user->save();
                DB::commit();
                return redirect()->back()->with(['success' => '1']);
            }
            else{
                return redirect()->back()->withInput()->withErrors(['current_password' => 'Sai mật khẩu']);
            }

        }
        catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }
}
