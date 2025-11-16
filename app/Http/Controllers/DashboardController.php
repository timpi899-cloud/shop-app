<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function user()
    {
        return view('dashboard.user', [
            'user' => Auth::user()
        ]);
    }

    public function admin()
    {
        return view('dashboard.admin', [
            'user'     => Auth::user(),
            'products' => Product::all(),
            'users'    => User::all()
        ]);
    }
}
