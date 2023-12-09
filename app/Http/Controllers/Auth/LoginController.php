<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function redirect()
    {
        if (Auth::user()->role == 'user') {
            return to_route('home');
        }
        elseif (Auth::user()->role == 'admin') {
            return to_route('dashboard.admin');
        }
        else {
            return back();
        }
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validated) {
            $auth = Auth::attempt($validated);
            if ($auth and Auth::user()->role == 'customer') {
                return to_route('home');
            }
            elseif ($auth and Auth::user()->role == 'admin') {
                return to_route('dashboard.admin');
            }
            else {
                Auth::logout();
                return back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('home');
    }
}
