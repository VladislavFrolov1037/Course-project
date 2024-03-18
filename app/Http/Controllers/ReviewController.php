<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->get();

        return view('review.index', compact('reviews'));
    }

    public function create()
    {
        return view('review.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['date'] = Carbon::now()->format('Y-m-d');
        $data['user_id'] = auth()->user()->id;

        Review::create($data);

        return redirect()->route('review.index');
    }
}


