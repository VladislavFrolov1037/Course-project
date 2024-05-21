<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendConfirmation;
use App\Jobs\SendReject;
use App\Models\Meeting;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class AdminMeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::where('status_id', 1)->paginate(10);

        return view('admin.meeting.index', compact('meetings'));
    }

    public function current()
    {
        $meetings = Meeting::where('status_id', 4)->paginate(10);

        return view('admin.meeting.current', compact('meetings'));
    }

    public function changeStatus(Meeting $meeting, Request $request)
    {
        $action = $request->input('action');

        $reason = $request->input('reason');

        if ($action === 'reject') {
            $meeting->status_id = 3;
        } elseif ($action === 'approve') {
            $meeting->status_id = 4;
        } else {
            $meeting->status_id = 2;
        }

        $meeting->save();

        $meeting->status_id == 4 ? SendConfirmation::dispatch($meeting) : SendReject::dispatch($meeting, $reason);

        return back();
    }

    public function pdf(Meeting $meeting)
    {
        return view('pdfs.download', compact('meeting'));
    }

    public function downloadPdf(Meeting $meeting)
    {
        return Pdf::setOption(['defaultFont' => 'Arial'])->loadView('pdfs.document', compact('meeting'))
            ->download('meeting.pdf');
    }
}
