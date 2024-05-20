<?php

namespace App\Filters;

use App\Models\City;

class AdvertisementFilter extends QueryFilter
{
    public function type_object($typeObject)
    {
        return $this->builder->where('type_object', $typeObject);
    }

    public function square($areaArr)
    {
        $minArea = $areaArr[0] ?? 1;
        $maxArea = $areaArr[1] ?? 999;

        return $this->builder->whereBetween('square', [$minArea, $maxArea]);
    }

    public function num_rooms($roomsArr)
    {
        $minNumRooms = $roomsArr[0] ?? 1;
        $maxNumRooms = $roomsArr[1] ?? 7;

        return $this->builder->whereBetween('num_rooms', [$minNumRooms, $maxNumRooms]);
    }

    public function price($priceArr)
    {
        $minPrice = $priceArr[0] ?? 0;
        $maxPrice = $priceArr[1] ?? PHP_FLOAT_MAX;

        return $this->builder->whereBetween('price', [$minPrice, $maxPrice]);
    }

    public function address_id($addressArr)
    {

        $cityId = $addressArr[0];
        $districtId = $addressArr[1];

        $district = City::findOrFail($cityId)->districts()->where('id', $districtId)->first();

        if ($district) {
            $address = $district->addresses()->first();
            if ($address) {
                return $this->builder->where('address_id', $address->id);
            }
        } else {
            return $this->builder->whereHas('address.district', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })->pluck('address_id');
        }

        return $this->builder->where('address_id', 0);

    }

    public function floor($floor = null)
    {
        if (empty($floor)) {
            return $this->builder;
        }

        return $this->builder->where('floor', $floor);
    }

    public function num_floors($num_floors = null)
    {
        if (empty($num_floors)) {
            return $this->builder;
        }

        return $this->builder->where('num_floors', $num_floors);
    }

    public function repair_type($repairType)
    {
        if ($repairType !== 'any') {
            return $this->builder->where('repair_type', $repairType);
        }

        return $this->builder;
    }

    public function rental_time($rentalTime)
    {
        return $this->builder->where('rental_time', $rentalTime);
    }

    public function balcony($balcony)
    {
        if ($balcony === 'Любой') {
            return $this->builder;
        }

        $balcony = ($balcony === 'true');

        return $this->builder->where('balcony', $balcony);
    }
}
