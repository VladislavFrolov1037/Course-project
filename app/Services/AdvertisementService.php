<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\District;
use App\Models\Favourite;
use App\Models\Image;
use App\Models\RepairType;
use App\Models\Review;
use App\Models\Status;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AdvertisementService
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

        if ($data['type_object'] === 'Дом') {
            $data['balcony'] = '';
        }

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

    public function getEnumValues($table, $column)
    {
        $results = DB::select("SHOW COLUMNS FROM `$table` LIKE '$column'");
        $columnType = $results[0]->Type;

        preg_match('/^enum\((.*)\)$/', $columnType, $matches);

        $values = explode(',', str_replace("'", "", $matches[1]));

        return $values;
    }

    public function getData($includeCities = false, $includeDistricts = false, $includeStatuses = false, $includeEnums = false): array
    {
        $data = [];

        if ($includeEnums) {
            $data['repairTypes'] = $this->getEnumValues('advertisements', 'repair_type');
            $data['typeObjects'] = $this->getEnumValues('advertisements', 'type_object');
            $data['rentalTimes'] = $this->getEnumValues('advertisements', 'rental_time');
        }

        if ($includeCities) {
            $cities = City::all();
            $data['cities'] = $cities;
        }

        if ($includeDistricts) {
            $districts = District::all();
            $data['districts'] = $districts;
        }

        if ($includeStatuses) {
            $statuses = Status::all();
            $data['statuses'] = $statuses;
        }

        return $data;
    }
}
