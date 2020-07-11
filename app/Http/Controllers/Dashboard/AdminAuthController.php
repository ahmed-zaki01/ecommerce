<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function attempt(Request $request)
    {
        //$rememberMe = $request->remember_me ? true : false;
        $checkAuth = auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$checkAuth) {
            session()->flash('status', 'Email or Password is not correct');
            return redirect(route('dashboard.login'));
        }

        session()->flash('status', 'You are logged in successfully');
        return redirect(route('dashboard.index'));
    } // end of attempt

}
