<?php

namespace App\Http\Controllers;

use App\Filters\AdvertisementFilter;
use App\Http\Requests\Advertisement\StoreRequest;
use App\Models\Advertisement;
use App\Services\AdvertisementService;

class AdvertisementController extends Controller
{

    protected AdvertisementService $advertisementService;

    public function __construct(AdvertisementService $advertisementService)
    {
        $this->advertisementService = $advertisementService;
    }

    public function index(AdvertisementFilter $request)
    {
        $data = $this->advertisementService->getData(true, true, false, true);

        $advertisements = Advertisement::Filter($request)->where('status_id', 2)->paginate(9);

        return view('advertisement.index', array_merge($data, ['advertisements' => $advertisements]));
    }

    public function create()
    {
        $data = $this->advertisementService->getData(true, true, false, true);

        return view('advertisement.create', $data);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->advertisementService->store($data);

        return redirect()->route('users.index');
    }

    public function show(Advertisement $advertisement)
    {
        $this->advertisementService->updateViews($advertisement);

        $images = $advertisement->images;

        return view('advertisement.show', compact('advertisement', 'images'));
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();

        if (auth()->user()->isAdmin()) {
            $referer = request()->header('referer');
            if ($referer) {

                if (strpos($referer, (string)$advertisement->id === false)) {
                    return redirect()->to($referer);
                }
            }
            return redirect()->route('admin.advertisements.index');
        }
        return redirect()->route('users.advertisements');
    }
}
