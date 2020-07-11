<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function attempt(Request $request)
    {

        //$rememberMe = $request->remember_me == 1 ? true : false;
        $checkAuth = admin_guard()->attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$checkAuth) {
            session()->flash('status', 'Email or Password is not correct');
            return redirect(route('dashboard.login'));
        }

        session()->flash('status', 'You are logged in successfully');
        return redirect(route('dashboard.index'));
    } // end of attempt

    public function forget_password()
    {
        return view('dashboard.auth.forget-password');
    } // end of forget password

    public function handle_forget_password(Request $request)
    {
        $checkEmail = $request->validate([
            'email' => 'required|email|exists:admins,email'
        ], [], ['email' => 'email']);

        if (!$checkEmail) {
            return back();
        } else {
            $admin = Admin::where('email', $request->email)->first();
            $token = Str::random(64);

            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));

            return back()->with('status', 'Email has been sent successfully!');
        }
    } // end of handle forget password

    public function reset_password($token)
    {
        $data = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if ($data) {
            return view('dashboard.auth.reset-password', compact('data'));
        } else {
            session()->flash('error', 'Your email has been expired, please try again.');
            return redirect(route('dashboard.forget_password'));
        }
    } // end of reset password

    public function handle_reset_password($token, Request $request)
    {
        $data = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if ($data) {
            $validatedData = $request->validate([
                'password' => 'required|string|confirmed|min:6|max:20',
                'password_confirmation' => 'required'
            ], [], ['password' => 'password', 'password_confirmation' => 'password confirmation']);

            Admin::where('email', $data->email)->update([
                'email' => $data->email,
                'password' => bcrypt($validatedData['password']),
            ]);

            DB::table('password_resets')->where('email', $data->email)->delete();
            admin_guard()->attempt(['email' => $data->email, 'password' => $validatedData['password']]);

            return redirect(route('dashboard.index'))->with('status', 'Password Updated Successfully!');
        } else {
            session()->flash('error', 'Your email has been expired, please try again.');
            return redirect(route('dashboard.forget_password'));
        }
    } // end of handle reset password
}
