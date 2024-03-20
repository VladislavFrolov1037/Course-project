<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // Вынести
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users', 'regex:/^(\+7|8)\d{10}$/'],
            'image' => ['required', 'extensions:jpg,png,jpeg'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);

        // Придумать что можно сделать... (Мб массивом, )
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->file('image')->store('uploads', 'public'),
            'password' => $request->password,
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
