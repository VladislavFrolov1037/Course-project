<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\StoreRequest;
use App\Models\FeedbackRequest;

class FeedbackRequestController extends Controller
{
    public function index()
    {

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        FeedbackRequest::create($data);

        return redirect()->route('main')->with('success_message', 'Форма успешно отправлена');
    }
}
