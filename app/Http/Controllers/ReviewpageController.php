<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewpageBanner;
use App\Models\ReviewpageContent;

class ReviewpageController extends Controller
{
    //
    public function updateReviewBanner(Request $request)
    {
        $request->validate([
            'review_banner_title' => 'required',

        ]);

        if ($request->hasFile('review_banner_image')) {
            $review_banner_image = $request->file('review_banner_image');
            $review_banner_image_name = $review_banner_image->getClientOriginalName();
            $review_banner_image->move(public_path('custom/settings'), $review_banner_image_name);
            $filePath = 'custom/settings/' . $review_banner_image_name;
        }
        $review_banner = ReviewpageBanner::first();

        $review_banner->review_banner_title = $request->review_banner_title;

        if ($request->hasFile('review_banner_image')) {
            $review_banner->review_banner_image = $filePath;
        }

        $review_banner->save();

        return redirect()->back()->with('success', 'Review Banner updated successfully');
    }
    public function updateReviewContent(Request $request)
    {
        $request->validate([
            'review_title' => 'required',
            'review_description' => 'required',
            'review_list_1' => 'required',
            'review_list_2' => 'required',
            'review_list_3' => 'required',

        ]);


        $review_content = ReviewpageContent::first();

        $review_content->review_title = $request->review_title;
        $review_content->review_description = $request->review_description;
        $review_content->review_list_1 = $request->review_list_1;
        $review_content->review_list_2 = $request->review_list_2;
        $review_content->review_list_3 = $request->review_list_3;

        $review_content->save();

        return redirect()->back()->with('success', 'Review Banner updated successfully');
    }
}
