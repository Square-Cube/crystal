<?php

namespace App\Http\Controllers\Admin\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller {

    public function __construct() {
        $this->middleware('guest.admin', ['except' => 'getLogout']);
    }

    public function getIndex() {
        return view('admin.auth.login');
    }

    public function postLogin(Request $r) {
        // 1- Validator::make()
        // 2- check if fails
        // 3- fails redirect or success not redirect

        $v = validator($r->all() ,[
            'email' => 'required',
            'password' => 'required'
        ] ,[
            'email.required' => 'Please enter your email address',
            'password.required' => 'Please enter your password'
        ]);

        if ($v->fails()){
            return  [
                'status' => 'error',
                'data' => implode("<br>" ,$v->errors()->all())
            ];
        }

        // grapping admin credentials
        $name = $r->input('email');
        $password = $r->input('password');
        // Searching for the admin matches the passed email or adminname
        $admin = User::where('username', $name)->orWhere('email', $name)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            // login the admin
            if ($admin->type == 'admin'){

                Auth::guard('admins')->login($admin, $r->has('remember'));
                $return = [
                    'status' => 'success',
                    'data' => 'You have logged in successfully',
                    'url' => route('admin.dashboard')
                ];
            }else{
                Auth::guard('admins')->login($admin, $r->has('remember'));
                $return = [
                    'status' => 'success',
                    'data' => 'You have logged in successfully',
                    'url' => route('admin.location')
                ];
            }
        } else {
            $return = [
                'status' => 'error',
                'data' => 'Data you entered is incorrect'
            ];
        }
        return response()->json($return);
    }

    /**
     * Logout The user
     */
    public function getLogout() {
        Auth::guard('admins')->logout();
        return redirect('/');
    }

}
