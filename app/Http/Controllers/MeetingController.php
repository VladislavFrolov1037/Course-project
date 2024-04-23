<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meeting\StoreRequest;
use App\Jobs\SendMeeting;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $meeting = Meeting::create($data);

        SendMeeting::dispatch($meeting);

        return redirect()->back()->with('success_message', 'Форма успешно отправлена');
    }
}
