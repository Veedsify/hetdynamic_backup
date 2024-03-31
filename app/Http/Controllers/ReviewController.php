<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewpageBanner;
use App\Models\ReviewpageContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ReviewController extends Controller
{
    //

    public function showReviewPage()
    {
        $reviewBanner  = ReviewpageBanner::first();
        $reviewContent  = ReviewpageContent::first();
        return View::make('pages.write-review',[
            'reviewBanner' => $reviewBanner,
            'reviewContent' => $reviewContent
        ]);
    }
}
