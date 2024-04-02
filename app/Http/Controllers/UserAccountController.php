<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $advertisements = $user->advertisements;

        return view('user.index', compact('user', 'advertisements'));
    }

    public function getUserAdvertisements()
    {
        $advertisements = $this->user->advertisements;

        return view('user.advertisements', compact('advertisements'));
    }

    public function editProfile()
    {
        $user = $this->user;

        return view('user.profile', compact('user'));
    }

    public function updateProfile(User $user, UserUpdateRequest $request)
    {
        $data = $request->validated();

        Storage::delete($user->image);

        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('uploads', 'public');
            $data['image'] = $photoPath;
        }

        $user->update($data);

        return redirect()->route('user.edit');
    }

    public function getUserReviews()
    {
        $reviews = $this->user->reviews;

        return view('user.reviews', compact('reviews'));
    }
}
