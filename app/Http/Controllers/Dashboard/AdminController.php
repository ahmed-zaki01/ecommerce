<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(AdminDataTable $adminDataTable)
    {
        return $adminDataTable->render('dashboard.admins.index');
    }
}
