<?php

namespace App\Http\Controllers;

use App\Filters\AdminAdvertisementFilter;
use App\Filters\AdvertisementFilter;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\District;
use App\Models\RepairType;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        $admin = auth()->user();
        return view('admin.index', compact('admin'));
    }

    public function showAll(AdminAdvertisementFilter $request)
    {
        $repairTypes = RepairType::all();
        $cities = City::all();
        $districts = District::all();
        $statuses = Status::all();

        $advertisements = Advertisement::Filter($request)->paginate(9);

        return view('admin.advertisement.index', compact('advertisements', 'districts', 'repairTypes', 'cities',
            'statuses'));
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

        return redirect()->route('admin.advertisement.expected');

    }

    public function showExpected()
    {
        $repairTypes = RepairType::all();
        $cities = City::all();
        $districts = District::all();
        $status = Status::where('name', 'Ожидание')->first();

        $advertisements = $status->advertisements()->paginate(9);
        return view('admin.advertisement.expectedAdvertisements', compact('advertisements', 'districts', 'repairTypes', 'cities',
            'status'));
    }
}
