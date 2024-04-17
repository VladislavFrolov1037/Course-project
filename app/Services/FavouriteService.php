<?php

namespace App\Services;

use App\Models\Advertisement;

class FavouriteService
{

    public function getFavouriteAdvertisements($user)
    {
        $advertisements = [];

        if ($user) {
            $advertisements = Advertisement::whereIn('id', $user->favourites->pluck('advertisement_id'))->get();
        } else {
            $favourites = session()->get('favourites', []);
            if (!empty($favourites)) {
                $advertisements = Advertisement::whereIn('id', $favourites)->get();
            }
        }

        return $advertisements;
    }

    public function addToFavourites($advertisement, $user)
    {
        if ($user) {
            $user->favourites()->create(['advertisement_id' => $advertisement->id]);
        } else {
            $favourites = session()->get('favourites', []);

            if (!in_array($advertisement->id, $favourites)) {
                $favourites[] = $advertisement->id;

                session()->put('favourites', $favourites);
            }
        }
    }

    public function removeFromFavourites($advertisement, $user)
    {
        if ($user) {
            $user->favourites()->where('advertisement_id', $advertisement->id)->firstOrFail()->delete();
        } else {
            $favourites = session()->get('favourites', []);

            $favourites = array_diff($favourites, [$advertisement->id]);

            session()->put('favourites', $favourites);
        }
    }
}
