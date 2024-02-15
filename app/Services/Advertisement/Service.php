<?php

namespace App\Services\Advertisement;

use App\Models\Advertisement;

class Service
{
    public function store($data)
    {
        $data['balcony'] = ($data['balcony'] === 'true');

        Advertisement::create($data);
    }

    public function update($advertisement, $data)
    {
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

}
