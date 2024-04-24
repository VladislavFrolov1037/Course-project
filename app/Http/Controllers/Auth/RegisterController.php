<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
use App\Jobs\SendRegister;
use App\Jobs\SendResetPassword;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('uploads', 'public');

        $user = User::create($data);

        Auth::login($user);

        SendRegister::dispatch($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function editPassword()
    {
        return view('auth.reset');
    }

    public function reset(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $password = Str::random(8);

        SendResetPassword::dispatch($user, $password);

        $hashedPassword = Hash::make($password);

        $user->password = $hashedPassword;

        $user->save();

        return redirect()->route('login');
    }
}
