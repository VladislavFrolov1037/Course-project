<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReviewController extends BaseController
{
    public function index(Request $request)
    {
        $reviews = Review::with('user')->get();

        if($request->ajax()) {
            return view('ajax.orderBy', compact('reviews'))->render();
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

        // В сервис
        $data['date'] = Carbon::now()->format('Y-m-d');
        $data['user_id'] = auth()->user()->id;

        Review::create($data);

        return redirect()->route('review.index');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back();
    }
}


