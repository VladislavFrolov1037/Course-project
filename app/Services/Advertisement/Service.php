<?php

namespace App\Services\Advertisement;

use App\Models\Advertisement;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($data)
    {
        $data['balcony'] = ($data['balcony'] === 'true');
        $data['user_id'] = auth()->user()->id;
        Advertisement::create($data);
    }

    public function update($advertisement, $data)
    {
        $user = Auth::user();
        $data['user_id'] = $user->id;

        $data['balcony'] = ($data['balcony'] === 'true');

        $advertisement->update($data);
    }

    public function updateViews($advertisement)
    {
        $id = $advertisement->id;

        if (!session()->has('viewed_advertisement_' . $id)) {
            $advertisement->views += 1;
            $advertisement->save();
            session(['viewed_advertisement_' . $id => true]);
        }
    }

    public function addToFavourites($advertisement)
    {
        $user = Auth::user();

        Favourite::firstOrCreate([
            'user_id' => $user->id,
            'advertisement_id' => $advertisement->id,
        ]);
    }

}
