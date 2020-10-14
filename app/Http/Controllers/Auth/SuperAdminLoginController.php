<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:superadmin',['except'=>['logout']]);
    }


    public function showLoginform()
    {
        return view('auth.superAdminLogin');
    }



    //this is login function for admin which is given email and password to get data form database
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('superadmin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('super.admin.dashboard'));
        }

        return redirect()->back();

    }



    //this funsion for admin logout which i customized to cpy form loginController
    public function logout()
    {
        Auth::guard('superadmin')->logout();
        return redirect(route('super.admin.dashboard'));
    }
}
