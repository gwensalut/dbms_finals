<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $r)
    {
        $credentials = $r->only(['username', 'password']);
        if (Auth::attempt($credentials)) {
            $r->session()->regenerate();

            return redirect()->route('home.page');
        }

        return back()->withErrors([
            'usernameLogin' => 'Username do not match any existing records',
            'passwordLogin' => 'Password do not match any existing records'
        ])->onlyInput(['usernameLogin', 'passwordLogin']);
    }

    public function register(Request $r)
    {
        $userInfo = $r->only(['username', 'password']);

        User::create([
            'username' => $userInfo['username'],
            'password' => $userInfo['password']
        ]);

        return redirect()->back();
    }

    public function logout(Request $r)
    {
        Auth::logout();

        $r->session()->invalidate();

        $r->session()->regenerateToken();

        return redirect('/');
    }
}
