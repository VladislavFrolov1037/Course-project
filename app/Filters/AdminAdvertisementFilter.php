<?php

namespace App\Filters;

class AdminAdvertisementFilter extends AdvertisementFilter
{
    public function status_id($id)
    {
        return $this->builder->where('status_id', $id);
    }

    public function address_id($addressArr)
    {
        if (isset($addressArr[1])) {
            if ($addressArr[0] == 'any' && $addressArr[1] == 'any') {
                return $this->builder;
            }
        } else {
            return $this->builder;
        }

        return parent::address_id($addressArr);
    }

    public function rental_time($id)
    {
        if ($id == 'any') {
            return $this->builder;
        }

        return parent::rental_time($id);
    }

    public function type_object($id)
    {
        if ($id == 'any') {
            return $this->builder;
        }

        return parent::type_object($id);
    }

    public function user_id($id = null)
    {
        if (empty($id)) {
            return $this->builder;
        }

        return $this->builder->where('user_id', $id);
    }
}


