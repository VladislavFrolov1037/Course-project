<?php

namespace App\Filters;

use App\Models\Address;
use App\Models\City;
use App\Models\District;

class AdminAdvertisementFilter extends AdvertisementFilter
{

    public function status_id($id)
    {
        return $this->builder->where('status_id', $id);
    }

}


