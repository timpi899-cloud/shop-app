<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ===========================
    // LOGIN
    // ===========================
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Cek role user
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah'])
            ->onlyInput('email');
    }

    // ===========================
    // REGISTER
    // ===========================
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $data = $request->validate([
            'name'     => ['required','string','max:100'],
            'email'    => ['required','email','unique:users,email'],
            'password' => ['required','min:6','confirmed'],
            'phone'    => ['nullable','string','max:20'],
            'address'  => ['nullable','string'],
        ]);

        $user = User::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
            'phone'        => $request->phone,
            'address'      => $request->address,
            'role'         => 'user',
            'is_member'    => false,
            'member_until' => null,
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }

    // ===========================
    // LOGOUT
    // ===========================
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
