<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Review;

class MainController extends Controller {
    public function index() {
        $user = auth()->user();

        $advertisements = Advertisement::query()->where('status_id', 2)->take(3)->orderByDesc('id')->get();

        $popularAdvertisements = Advertisement::query()->orderByDesc('views')->take(3)->get();

        $reviews = Review::query()->orderByDesc('rating')->orderByDesc('date')->take(2)->get();

        return view('main', compact('user', 'advertisements', 'popularAdvertisements', 'reviews'));
    }
}
