<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\ReviewService;
use App\Services\StatusService;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    protected StatusService $statusService;
    protected reviewService $reviewService;

    public function __construct(StatusService $statusService, reviewService $reviewService)
    {
        $this->statusService = $statusService;
        $this->reviewService = $reviewService;
    }

    public function index(Request $request)
    {
        $orderBy = $request->input('orderBy', 'default');

        $reviews = $this->reviewService->sortReview($request);

        if ($request->ajax()) {
            $pagination = $reviews->appends(['orderBy' => $orderBy])->links()->toHtml();

            return response()->json([
                'reviews' => $reviews->items(),
                'pagination' => $pagination,
            ]);
        }

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
