<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackRequest;
use App\Services\ReviewService;
use App\Services\StatusService;
use Illuminate\Http\Request;

class AdminFeedbacksController extends Controller
{
    protected StatusService $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function index()
    {
        $feedbacks = FeedbackRequest::where('status_id', 1)->paginate(10);

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function approve()
    {
        $feedbacks = FeedbackRequest::where('status_id', 2)->paginate(10);

        return view('admin.feedback.approve', compact('feedbacks'));
    }

    public function changeStatus(FeedbackRequest $feedback, Request $request)
    {
        $action = $request->input('action');

        $this->statusService->changeStatus($feedback, $action);

        return back();
    }

    public function destroy(FeedbackRequest $feedback)
    {
        $feedback->delete();

        return back();
    }
}
