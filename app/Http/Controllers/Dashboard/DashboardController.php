<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        session()->flash('status', 'You are logged out successfully');
        return redirect(route('dashboard.login'));
    } // end of logout
}
