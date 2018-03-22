<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function index() {
        return view('auth.adminLogin');
    }

    public function login(Request $request) {
        //validate the data
        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        //attempt to log ih the admin
        if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password], $request->remenber)){
            //if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        };

        //if unsuccessful, then redirect back to the login with
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
