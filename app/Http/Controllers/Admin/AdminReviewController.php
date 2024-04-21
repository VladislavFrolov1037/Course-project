<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\StatusService;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    protected StatusService $statusService;

    public function __construct(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    public function index()
    {
        $reviews = Review::where('status_id', 2)->paginate(10);

        return view('admin.review.index', compact('reviews'));
    }

    public function expected()
    {
        $reviews = Review::where('status_id', 1)->paginate(10);

        return view('admin.review.expected', compact('reviews'));
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back();
    }

    public function changeStatus(Request $request, Review $review)
    {
        $action = $request->input('action');

        $this->statusService->changeStatus($review, $action);

        return redirect()->route('admin.reviews.expected');
    }

    public function cancelled()
    {
        $reviews = Review::where('status_id', 3)->paginate(10);

        return view('admin.review.cancelled', compact('reviews'));
    }
}


