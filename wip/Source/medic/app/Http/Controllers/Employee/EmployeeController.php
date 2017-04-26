<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SubPharmacy;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EmployeeController extends Controller
{
    //

    protected $redirectTo = '/login';


    public function __construct()
    {

        $this->middleware('auth');
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
                $newUser->password = bcrypt("123456");
                $newUser->name = request('name');
                $newUser->address = request('address');
                $newUser->phone = request('phone');
                if (request('role') == 'Quản lý') {
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
//        $user = new User;
        $user = User::where('account', $account)->first();

        return view('employee_edit', compact('user'));
    }

    public function deleteEmployee($account){
        User::where('account', $account)->delete();
        return redirect('/employee');
    }

    public function updateEmployee($account){
        $user = User::where('account', $account)->first();
        if($user) {
            $user->sub_pharmacy_id = SubPharmacy::where('name', request('agency'))->first()->id;
            $user->address = request('address');
            $user->phone = request('phone');
            $user->role = 1;
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
}
