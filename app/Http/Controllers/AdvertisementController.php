<?php

namespace App\Http\Controllers;

use App\Filters\AdvertisementFilter;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Http\Requests\Advertisement\UpdateRequest;
use App\Models\Address;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\District;
use App\Models\RentalTime;
use App\Models\RepairType;
use App\Models\TypeObject;

class AdvertisementController extends BaseController
{
    public function index(AdvertisementFilter $request)
    {
        // Надо куда-то вынести...
        $repairTypes = RepairType::all();
        $cities = City::all();
        $districts = District::all();

        $advertisements = Advertisement::Filter($request)->paginate(9);
        return view('advertisement.index', compact('advertisements', 'districts', 'repairTypes', 'cities'));
    }

    public function create()
    {
        // Надо куда-то вынести...
        $repairTypes = RepairType::all();
        $cities = City::all();
        $districts = District::all();

        return view('advertisement.create', compact('districts', 'repairTypes', 'cities'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $address = Address::create([
            'address' => $request->address,
            'house_number' => $request->house_number,
            'district_id' => $request->district_id,
        ]);

        $data['address_id'] = $address->id;

        $this->service->store($data);

        return redirect()->route('advertisement.index');
    }

    public function show(Advertisement $advertisement)
    {
        $this->service->updateViews($advertisement);
//        $user = User::find($advertisement->user_id);
        return view('advertisement.show', compact('advertisement'));
    }

    public function edit(Advertisement $advertisement)
    {
        // Надо куда-то вынести...
        $districts = District::all();
        $repairTypes = RepairType::all();
        return view('advertisement.edit', compact('advertisement', 'districts', 'repairTypes'));
    }

    public function update(Advertisement $advertisement, UpdateRequest $request)
    {
        $data = $request->validated();

        $this->service->update($advertisement, $data);

        return redirect()->route('advertisement.show', $advertisement->id);
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();

        if (auth()->user()->role === 'admin')
            return redirect()->route('admin.advertisement');

        return redirect()->route('advertisement.index');
    }

}
