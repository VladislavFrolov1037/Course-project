<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends BaseController
{

    public function index()
    {
        if (Auth::check()) {
            $user = auth()->user();

            $advertisements = Advertisement::whereIn('id', $user->favourites->pluck('advertisement_id'))->get();

            return view('favourite.index', compact('advertisements'));
        } else {
            return redirect()->route('register');
        }
    }

    public function store(Advertisement $advertisement)
    {
        $this->service->addToFavourites($advertisement);

        return redirect()->route('advertisement.index');
    }

    public function destroy(Advertisement $advertisement)
    {
        $user = auth()->user();

        $user->favourites()->where('advertisement_id', $advertisement->id)->firstOrFail()->delete();

        return redirect()->route('favourite');
    }
}
