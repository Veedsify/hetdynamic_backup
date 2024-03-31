<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacypageBanner;
use App\Models\PrivacypageContent;

class PrivacypageController extends Controller
{
    //
    public function updatePolicyBanner(Request $request)
    {
        $request->validate([
            'privacy_banner_title' => 'required',
        ]);

        if ($request->hasFile('privacy_banner_image')) {
            $privacy_banner_image = $request->file('privacy_banner_image');
            $privacy_banner_image_name = $privacy_banner_image->getClientOriginalName();
            $privacy_banner_image->move(public_path('custom/settings'), $privacy_banner_image_name);
            $filePath = 'custom/settings/' . $privacy_banner_image_name;
        }
        $privacy_banner = PrivacypageBanner::first();

        $privacy_banner->privacy_banner_title = $request->privacy_banner_title;

        if ($request->hasFile('privacy_banner_image')) {
            $privacy_banner->privacy_banner_image = $filePath;
        }

        $privacy_banner->save();

        return redirect()->back()->with('success', 'Contact Us Banner updated successfully');
    }
    public function updatePolicyContent(Request $request)
    {
        $request->validate([
            'privacy_title' => 'required',
            'privacy_description' => 'required',

        ]);


        $privacy_content = PrivacypageContent::first();

        $privacy_content->privacy_title = $request->privacy_title;
        $privacy_content->privacy_description = $request->privacy_description;



        $privacy_content->save();

        return redirect()->back()->with('success', 'Privacy Content updated successfully');
    }
}
