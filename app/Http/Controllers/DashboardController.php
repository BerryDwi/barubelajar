<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data  = [
            'title' => 'Dashboard',
            'countAdmin' => User::where('role', 'admin')->count(),
            'countSuperAdmin' => User::where('role', 'superadmin')->count(),
            'countUser' => User::count()

        ];


        return view('dashboard', $data);
    }
}
