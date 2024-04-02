<?php

namespace App\Http\Controllers;

use App\Filters\AdvertisementFilter;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Http\Requests\Advertisement\UpdateRequest;
use App\Models\Address;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\District;
use App\Models\Image;
use App\Models\RentalTime;
use App\Models\RepairType;
use App\Models\TypeObject;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class AdvertisementController extends BaseController
{
    public function index(AdvertisementFilter $request)
    {
        $data = $this->service->getData();

        $advertisements = Advertisement::Filter($request)->where('status_id', 2)->paginate(9);

        $images = Image::all();

        return view('advertisement.index', array_merge($data, ['advertisements' => $advertisements, 'images' => $images]));
    }

    public function create()
    {
        $data = $this->service->getData();

        return view('advertisement.create', $data);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('user.index');
    }

    public function show(Advertisement $advertisement)
    {
        $this->service->updateViews($advertisement);

        $images = $advertisement->images;

        return view('advertisement.show', compact('advertisement', 'images'));
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

//        if (auth()->user()->role === 'admin')
//            return redirect()->route('admin.advertisement');
//
//        return redirect()->route('advertisement.index');

        return back();
    }

}
