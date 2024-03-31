<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutpageAbout;
use App\Models\AboutpageBanner;
use App\Models\AboutpageExperience;
use App\Http\Controllers\Controller;

class AboutpageController extends Controller
{
    //


    public function updateAboutBanneer(Request $request)
    {
        $request->validate([
            'about_banner_title' => 'required',
        ]);
        if ($request->hasFile('about_banner_image')) {
            $about_banner_image = $request->file('about_banner_image');
            $about_banner_image_name = $about_banner_image->getClientOriginalName();
            $about_banner_image->move(public_path('custom/settings'), $about_banner_image_name);
            $filePath = 'custom/settings/' . $about_banner_image_name;
        }
        $about_banner = AboutpageBanner::first();
        $about_banner->about_banner_title= $request->about_banner_title;

        if ($request->hasFile('about_banner_image')) {
            $about_banner->about_banner_image = $filePath;
        }
        $about_banner->save();
        return redirect()->back()->with('success', 'About banner updated successfully');
    }

    public function updateExperience(Request $request)
{
    $request->validate([
        'experience_title' => 'required',
        'experience_sub_title' => 'required',
        'experience_description' => 'required',
        'experience_feature_1' => 'required',
        'experience_feature_2' => 'required',
        'experience_years' => 'required',
    ]);

    $experience = AboutpageExperience::first();

    if ($request->hasFile('experience_image_1')) {
        $experience_image_1 = $request->file('experience_image_1');
        $experience_image_1_name = $experience_image_1->getClientOriginalName();
        $experience_image_1->move(public_path('custom/settings'), $experience_image_1_name);
        $experience->experience_image_1 = 'custom/settings/' . $experience_image_1_name;
    }

    if ($request->hasFile('experience_image_2')) {
        $experience_image_2 = $request->file('experience_image_2');
        $experience_image_2_name = $experience_image_2->getClientOriginalName();
        $experience_image_2->move(public_path('custom/settings'), $experience_image_2_name);
        $experience->experience_image_2 = 'custom/settings/' . $experience_image_2_name;
    }

    $experience->experience_title = $request->experience_title;
    $experience->experience_sub_title = $request->experience_sub_title;
    $experience->experience_description = $request->experience_description;
    $experience->experience_feature_1 = $request->experience_feature_1;
    $experience->experience_feature_2 = $request->experience_feature_2;
    $experience->experience_years = $request->experience_years;

    $experience->save();

    return redirect()->back()->with('success', 'Experience updated successfully');
}
public function updateAboutUs(Request $request)
{
    $request->validate([
        'about_us_title' => 'required',
        'about_us_sub_title_1' => 'required',
        'about_us_sub_title_2' => 'required',
        'about_us_description_1' => 'required',
        'about_us_description_2' => 'required',
        'about_us_feature_1' => 'required',
        'about_us_feature_2' => 'required',
    ]);

    $about_us = AboutpageAbout::first();

    $about_us->about_us_title = $request->about_us_title;
    $about_us->about_us_sub_title_1 = $request->about_us_sub_title_1;
    $about_us->about_us_sub_title_2 = $request->about_us_sub_title_2;
    $about_us->about_us_description_1 = $request->about_us_description_1;
    $about_us->about_us_description_2 = $request->about_us_description_2;
    $about_us->about_us_feature_1 = $request->about_us_feature_1;
    $about_us->about_us_feature_2 = $request->about_us_feature_2;

    $about_us->save();

    return redirect()->back()->with('success', 'About Us details updated successfully');
}
}
