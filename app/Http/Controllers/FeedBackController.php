<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FeedBackController extends Controller {
    public function index() {
        return view('feedback');
    }
}


