<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminConsultationController extends Controller
{
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

        if ($action === 'reject') {
            $consultation->status_id = 3;
        } else if ($action === 'current') {
            $consultation->status_id = 2;
        } else {
            $consultation->status_id = 4;
        }

        $consultation->save();

        return back();
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return back();
    }
}
