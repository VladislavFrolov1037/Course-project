<?php

namespace App\Services\Advertisement;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class Service
{
    public function store($data)
    {
        $data['balcony'] = ($data['balcony'] === 'true');

        Product::create($data);
    }

    public function update($advertisement, $data)
    {
        $data['balcony'] = ($data['balcony'] === 'true');

        $advertisement->update($data);
    }

    public function updateViews($advertisement)
    {
        $id = $advertisement->id;

        if (!session()->has('viewed_product_' . $id)) {
            $advertisement->views += 1;
            $advertisement->save();
            session(['viewed_product_' . $id => true]);
        }
    }

}
