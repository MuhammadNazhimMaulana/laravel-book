<?php 

namespace App\Repositories\Auth;

// Interface
use App\Interfaces\Auth\AuthInterface_Admin;

// Model
use App\Models\User;

use Illuminate\Support\Facades\{Hash, Auth};

// Request
use App\Http\Requests\Auth\{StoreRegister, Login};
use Illuminate\Http\Request;

class AuthRepository_Admin implements AuthInterface_Admin
{

    public function login()
    {
        $data = [
            "title" => "Login",
        ];

        return view('Auth/login_view_admin', $data);
    }

    public function register()
    {
        $data = [
            "title" => "Register",
        ];

        return view('Auth/register_view_admin', $data);
    }

    // Post Registrasi
    public function storeRegister(StoreRegister $request)
    {
        $data_register = [
            'username' => $request->input('username'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'no_hp' => $request->input('no_hp'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $data_register['password'] = Hash::make($data_register['password']);
        $data_register['role'] = 1;

        User::create($data_register);

        // Session
        $request->session()->flash('success', 'Registrasi tekah Berhasil Silakan Login');

        // Redirect to Login
        return redirect('/admin/login');
    }

    // Auth Login (Cek untuk Login)
    public function authLogin(Login $request)
    {
        $pengguna = User::where('username', $request->username)->first();

        $loginData = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            // Store data in session
            $request->session()->put('pengguna', [$pengguna->first_name, $pengguna->username, $pengguna->id]);

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

}

