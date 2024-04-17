<?php

namespace App\Services;

use App\Http\Controllers\ReviewController;
use App\Models\Review;
use Illuminate\Support\Carbon;

class ReviewService
{
    public function sortReview($request)
    {
        $orderBy = $request->input('orderBy', 'default');
        switch ($orderBy) {
            case 'rating-high-low':
                return Review::with('user')->orderByDesc('rating')->paginate(9);
            case 'rating-low-high':
                return Review::with('user')->orderBy('rating')->paginate(9);
            case 'date-old-new':
                return Review::with('user')->orderByDesc('date')->paginate(9);
            case 'date-new-old':
                return Review::with('user')->orderBy('date')->paginate(9);
            default:
                return Review::with('user')->paginate(9);
        }
    }

    public function storeReview($data): void
    {
        $data['date'] = Carbon::now()->format('Y-m-d');

        $data['user_id'] = auth()->user()->id;

        Review::create($data);
    }
}
