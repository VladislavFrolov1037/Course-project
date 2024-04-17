<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{

    protected ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
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
                'pagination' => $pagination
            ]);
        }
        return view('review.index', compact('reviews'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->reviewService->storeReview($data);

        return redirect()->route('review.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back();
    }
}


