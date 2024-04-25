<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Services\StatusService;
use Illuminate\Http\Request;

class AdminConsultationController extends Controller
{

    protected StatusService $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'desc');

        $consultations = Consultation::query()->orderBy($sort, $order)->paginate(10);

        return view('admin.consultation.index', compact('consultations', 'sort', 'order'));
    }

    public function current(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'desc');

        $consultations = Consultation::query()->where('status_id', 4)->orderBy($sort, $order)->paginate(10);

        return view('admin.consultation.current', compact('consultations', 'sort', 'order'));
    }

    public function expected(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'desc');

        $consultations = Consultation::query()->where('status_id', 1)->orderBy($sort, $order)->paginate(10);

        return view('admin.consultation.expected', compact('consultations', 'sort', 'order'));
    }

    public function changeStatus(Consultation $consultation, Request $request)
    {
        $action = $request->input('action');

        $this->statusService->changeStatus($consultation, $action);

        return back();
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return back();
    }
}
