<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Введенные данные для входа неверные.'
                ]);
        }

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->route('user.index');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('main');
    }
}
