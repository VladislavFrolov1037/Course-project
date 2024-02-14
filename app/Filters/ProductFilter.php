<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{

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

    public function time_of_agreement($time_of_agreement)
    {
        if ($time_of_agreement === 'Любой')
            return $this->builder;

        return $this->builder->where('time_of_agreement', $time_of_agreement);
    }

    public function balcony($balcony)
    {
        if ($balcony === 'Любой')
            return $this->builder;

        return $this->builder->where('balcony', $balcony);
    }

}

