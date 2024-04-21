<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Consultation;
use App\Models\FeedbackRequest;
use App\Models\Meeting;
use App\Models\Review;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $advertisementsCount = Advertisement::where('status_id', 1)->count();

        $usersCount = User::all()->count();

        $consultationsCount = Consultation::where('status_id', 1)->count();

        $reviewsCount = Review::where('status_id', 1)->count();

        $ideaCount = FeedbackRequest::where('status_id', 1)->count();

        $meetingCount = Meeting::where('status_id', 1)->count();

        return view('admin.index', compact('advertisementsCount', 'usersCount', 'consultationsCount', 'reviewsCount', 'ideaCount', 'meetingCount'));
    }
}
