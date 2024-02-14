<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Введенные данные для входа неверные.'
                ]);
        }

        return redirect()->route('user');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('main');
    }
}
