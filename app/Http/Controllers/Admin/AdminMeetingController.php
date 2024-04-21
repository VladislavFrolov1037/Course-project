<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class AdminMeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::where('status_id', 1)->paginate(10);

        return view('admin.meeting.index', compact('meetings'));
    }
}
