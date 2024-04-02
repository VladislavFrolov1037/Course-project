<?php

namespace App\Services\Advertisement;

use App\Models\Address;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\District;
use App\Models\Favourite;
use App\Models\Image;
use App\Models\RepairType;
use App\Models\Review;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($data)
    {
        $address = Address::create([
            'address' => $data['address'],
            'house_number' => $data['house_number'],
            'district_id' => $data['district_id'],
        ]);

        $images = $data['images'];

        $data['address_id'] = $address->id;

        $data = Arr::except($data, ['address', 'house_number', 'district_id', 'images']);

        $data['balcony'] = ($data['balcony'] === 'true');
        $data['user_id'] = auth()->user()->id;

        $advertisement = Advertisement::create($data);

        foreach ($images as $img) {
            Image::create([
                'url' => $img->store('uploads', 'public'),
                'advertisement_id' => $advertisement->id,
            ]);
        }
    }

    public function update($advertisement, $data)
    {
        $user = auth()->user();
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
        $user = auth()->user();

        Favourite::firstOrCreate([
            'user_id' => $user->id,
            'advertisement_id' => $advertisement->id,
        ]);
    }

    public function getData()
    {
        $repairTypes = RepairType::all();
        $cities = City::all();
        $districts = District::all();
        return compact('repairTypes', 'cities', 'districts');
    }

    public function sortReview()
    {

        if (isset($request->orderBy)) {
            if ($request->orderBy === 'rating-high-low') {
                $reviews = Review::with('user')->orderBy('rating', 'desc')->get();
            }
            if ($request->orderBy === 'rating-low-high') {
                $reviews = Review::with('user')->orderBy('rating')->get();
            }
            if ($request->orderBy === 'date-old-new') {
                $reviews = Review::with('user')->orderBy('date', 'desc')->get();
            }
            if ($request->orderBy === 'date-new-old') {
                $reviews = Review::with('user')->orderBy('date')->get();
            }
            if ($request->orderBy === 'default') {
                $reviews = Review::with('user')->get();
            }
        }

    }
}
