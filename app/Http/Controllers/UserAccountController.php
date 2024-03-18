<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    public function index()
    {
        $user = $this->user;
        $advertisements = $this->user->advertisements;

        return view('user.index', compact('user', 'advertisements'));
    }

    public function myAdvertisements()
    {
        $advertisements = $this->user->advertisements;

        return view('user.advertisements', compact('advertisements'));
    }
}
