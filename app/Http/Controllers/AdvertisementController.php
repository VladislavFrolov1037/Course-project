<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Advertisement;
use App\Models\TypeObject;

class AdvertisementController extends BaseController
{
    public function index(ProductFilter $request)
    {
//        $typeObject = TypeObject::find(2);
//        dd($typeObject->advertisements);

        $advertisements = Advertisement::Filter($request)->paginate(9);
        return view('advertisement.index', compact('advertisements'));
    }

    public function create()
    {
        return view('advertisement.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('advertisement.index');
    }

    public function show(Advertisement $advertisement)
    {
//        $this->service->updateViews($advertisement);
        return view('advertisement.show', compact('advertisement'));
    }

    public function edit(Advertisement $advertisement)
    {
        return view('advertisement.edit', compact('advertisement'));
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
        return redirect()->route('advertisement.index');
    }
}
