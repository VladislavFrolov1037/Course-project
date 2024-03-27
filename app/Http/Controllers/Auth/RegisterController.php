<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
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

    public function store(StoreRequest $request)
    {
        // Вынести в сервис
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('uploads', 'public');

        $user = User::create($data);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
