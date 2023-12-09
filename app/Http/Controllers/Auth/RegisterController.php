<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $registerRequest)
    {
        if ($registerRequest->validated())
        {
            User::create([
                'name' => $registerRequest->name,
                'phone' => $registerRequest->phone,
                'email' => $registerRequest->email,
                'password' => $registerRequest->password,
                'address' => $registerRequest->address,
            ]);
            return to_route('login');
        }
    }
}
