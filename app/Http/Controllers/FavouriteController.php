<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Services\AdvertisementService;
use App\Services\FavouriteService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class FavouriteController extends Controller
{

    protected FavouriteService $favouriteService;

    public function __construct(FavouriteService $favouriteService)
    {
        $this->favouriteService = $favouriteService;
    }

    public function index()
    {
        $user = auth()->user();

        $advertisements = $this->favouriteService->getFavouriteAdvertisements($user);

        return view('favourite.index', compact('advertisements'));
    }

    public function store(Advertisement $advertisement)
    {
        $user = auth()->user();

        $this->favouriteService->addToFavourites($advertisement, $user);

        return back();
    }

    public function destroy(Advertisement $advertisement)
    {
        $user = auth()->user();

        $this->favouriteService->removeFromFavourites($advertisement, $user);

        return back();
    }
}
