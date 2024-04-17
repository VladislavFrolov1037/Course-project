<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AdminAdvertisementFilter;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\District;
use App\Models\Image;
use App\Models\RepairType;
use App\Models\Status;
use App\Services\AdvertisementService;
use Illuminate\Http\Request;

class AdminAdvertisementController extends Controller
{
    protected AdvertisementService $advertisementService;

    public function __construct(AdvertisementService $advertisementService)
    {
        $this->advertisementService = $advertisementService;
    }

    public function index(AdminAdvertisementFilter $request)
    {
        $data = $this->advertisementService->getData(true, true, true, true);

        $advertisements = Advertisement::Filter($request)->paginate(9);

        return view('admin.advertisement.index', array_merge($data, ['advertisements' => $advertisements]));
    }

    public function changeStatus(Request $request, Advertisement $advertisement)
    {
        // Вынести в service
        if ($request->input('action') === 'approve') {
            $advertisement->status_id = 2;
        } else {
            $advertisement->status_id = 3;
        }

        $advertisement->save();

        return back();
    }

    public function show(Advertisement $advertisement)
    {
        $images = $advertisement->images()->get();

        return view('admin.advertisement.show', compact('advertisement', 'images'));
    }

    public function showExpected()
    {
        $data = $this->advertisementService->getData(true, true);

        $status = Status::where('name', 'Ожидание')->first();

        $advertisements = $status->advertisements()->paginate(9);

        return view('admin.advertisement.expectedAdvertisements', array_merge($data, ['advertisements' => $advertisements,
            'status' => $status]));
    }
}
