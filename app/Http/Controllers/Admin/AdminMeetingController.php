<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendConfirmation;
use App\Jobs\SendReject;
use App\Models\Meeting;
use App\Services\StatusService;
use Illuminate\Http\Request;

class AdminMeetingController extends Controller
{

    protected StatusService $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function index()
    {
        $meetings = Meeting::where('status_id', 1)->paginate(10);

        return view('admin.meeting.index', compact('meetings'));
    }

    public function changeStatus(Meeting $meeting, Request $request)
    {
        $action = $request->input('action');

        $reason = $request->input('reason');

        $this->statusService->changeStatus($meeting, $action);

        $meeting->status_id == 2 ? SendConfirmation::dispatch($meeting) : SendReject::dispatch($meeting, $reason);

        return back();
    }
}
