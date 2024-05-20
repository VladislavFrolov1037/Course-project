<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AdminAdvertisementFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdvertisementRequest;
use App\Models\Advertisement;
use App\Models\Status;
use App\Services\AdvertisementService;
use App\Services\StatusService;
use Illuminate\Http\Request;

class AdminAdvertisementController extends Controller
{
    protected AdvertisementService $advertisementService;

    protected StatusService $statusService;

    public function __construct(AdvertisementService $advertisementService, StatusService $statusService)
    {
        $this->advertisementService = $advertisementService;
        $this->statusService = $statusService;
    }

    public function index(AdminAdvertisementFilter $request)
    {
        $data = $this->advertisementService->getData(true, true, true, true);

        $advertisements = Advertisement::Filter($request)->orderByDesc('id')->paginate(9);

        return view('admin.advertisement.index', array_merge($data, ['advertisements' => $advertisements]));
    }

    public function changeStatus(Request $request, Advertisement $advertisement)
    {
        $action = $request->input('action');

        $this->statusService->changeStatus($advertisement, $action);

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

        $advertisements = $status->advertisements()->orderByDesc('id')->paginate(9);

        return view('admin.advertisement.expectedAdvertisements', array_merge($data, ['advertisements' => $advertisements,
            'status' => $status]));
    }

    public function edit(Advertisement $advertisement)
    {
        $data = $this->advertisementService->getData(true, true, true, true);

        return view('admin.advertisement.edit', array_merge($data, ['advertisement' => $advertisement]));
    }

    public function update(Advertisement $advertisement, UpdateAdvertisementRequest $request)
    {
        $data = $request->validated();

        $this->advertisementService->updateAdvertisement($data, $advertisement);

        return redirect()->route('admin.advertisements.show', $advertisement->id);
    }
}
