<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AdminAdvertisementFilter;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\District;
use App\Models\RepairType;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $advertisementsCount = Advertisement::all()->count();
        return view('admin.index', compact('advertisementsCount'));
    }
}
