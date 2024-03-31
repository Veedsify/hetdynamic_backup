<?php

namespace App\Http\Controllers;

use Spatie\Image\Image;
use Illuminate\Http\Request;
use App\Models\HomepageBanner;
use App\Models\HomepageSupport;
use App\Models\HomepageCoaching;
use App\Models\HomepageConsulting;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\Image\Drivers\ImageDriver;


class HomepageController extends Controller
{
    public function updateBanner(Request $request)
    {

        try {

            $request->validate([
                'banner_text_1' => 'required',
                'banner_text_2' => 'required',
                'banner_text_3' => 'required',
            ]);

            if ($request->hasFile('banner_image_1')) {
                $banner_image_1 = $request->file('banner_image_1');
                $banner_image_1_name = $banner_image_1->getClientOriginalName();
                $banner_image_1->move(public_path('custom/settings'), $banner_image_1_name);
                $filePath1 = 'custom/settings/' . $banner_image_1_name;
            }
            if ($request->hasFile('banner_image_2')) {
                $banner_image_2 = $request->file('banner_image_2');
                $banner_image_2_name = $banner_image_2->getClientOriginalName();
                $banner_image_2->move(public_path('custom/settings'), $banner_image_2_name);
                $filePath2 = 'custom/settings/' . $banner_image_2_name;
            }
            if ($request->hasFile('banner_image_3')) {
                $banner_image_3 = $request->file('banner_image_3');
                $banner_image_3_name = $banner_image_3->getClientOriginalName();
                $banner_image_3->move(public_path('custom/settings'), $banner_image_3_name);
                $filePath3 = 'custom/settings/' . $banner_image_3_name;
            }

            $homepageBanner = HomepageBanner::first();
            $homepageBanner->banner_text_1 = $request->banner_text_1;
            $homepageBanner->banner_text_2 = $request->banner_text_2;
            $homepageBanner->banner_text_3 = $request->banner_text_3;
            if ($request->hasFile('banner_image_1')) {
                $homepageBanner->banner_image_1 = $filePath1;
            }
            if ($request->hasFile('banner_image_2')) {
                $homepageBanner->banner_image_2 = $filePath2;
            }
            if ($request->hasFile('banner_image_3')) {
                $homepageBanner->banner_image_3 = $filePath3;
            }
            $homepageBanner->save();

            return redirect()->back()->with('success', 'Homepage banner updated successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the home page banner');
        }
    }

    public function updateConsulting(Request $request)
    {
        $request->validate([
            'consulting_title' => 'required',
            'consulting_description' => 'required',
            'consulting_feature_1' => 'required',
            'consulting_feature_2' => 'required',
            'consulting_desc_1' => 'required',
            'consulting_desc_2' => 'required',
        ]);

        if ($request->hasFile('consulting_image')) {
            $consulting_image = $request->file('consulting_image');
            $consulting_image_name = $consulting_image->getClientOriginalName();
            $consulting_image->move(public_path('custom/settings'), $consulting_image_name);
            $filePath = 'custom/settings/' . $consulting_image_name;
        }
        if ($request->hasFile('consulting_image_2')) {
            $consulting_image_2 = $request->file('consulting_image_2');
            $consulting_image_2_name = $consulting_image_2->getClientOriginalName();
            $consulting_image_2->move(public_path('custom/settings'), $consulting_image_2_name);
            $filePath2 = 'custom/settings/' . $consulting_image_2_name;
        }

        $homepageConsulting = HomepageConsulting::first();
        $homepageConsulting->consulting_title = $request->consulting_title;
        $homepageConsulting->consulting_description = $request->consulting_description;
        $homepageConsulting->consulting_feature_1 = $request->consulting_feature_1;
        $homepageConsulting->consulting_feature_2 = $request->consulting_feature_2;
        $homepageConsulting->consulting_desc_1 = $request->consulting_desc_1;
        $homepageConsulting->consulting_desc_2 = $request->consulting_desc_2;
        if ($request->hasFile('consulting_image')) {
            $homepageConsulting->consulting_image = $filePath;
        }
        if ($request->hasFile('consulting_image_2')) {
            $homepageConsulting->consulting_image_2 = $filePath2;
        }
        $homepageConsulting->save();

        return redirect()->back()->with('success', 'Homepage consulting updated successfully');
    }

    public function updateOurSupport(Request $request)
    {
        $request->validate([
            'support_title' => 'required',
            'support_feature_1' => 'required',
            'support_feature_2' => 'required',
            'support_feature_3' => 'required',
            'support_video' => 'required',
        ]);

        if ($request->hasFile('support_image')) {
            $support_image = $request->file('support_image');
            $support_image_name = $support_image->getClientOriginalName();
            $support_image->move(public_path('custom/settings'), $support_image_name);
            $filePath = 'custom/settings/' . $support_image_name;
        }

        $homepageSupport = HomepageSupport::first();
        $homepageSupport->support_title = $request->support_title;
        $homepageSupport->support_feature_1 = $request->support_feature_1;
        $homepageSupport->support_feature_2 = $request->support_feature_2;
        $homepageSupport->support_feature_3 = $request->support_feature_3;
        $homepageSupport->support_video = $request->support_video;
        if ($request->hasFile('support_image')) {
            $homepageSupport->support_image = $filePath;
        }
        $homepageSupport->save();

        return redirect()->back()->with('success', 'Homepage support updated successfully');
    }

    public function updateCoachingAndTraining(Request $request)
    {
        $request->validate([
            'coaching_title' => 'required',
            'coaching_description' => 'required',
        ]);


        $homepageCoaching = HomepageCoaching::first();
        $homepageCoaching->coaching_title = $request->coaching_title;
        $homepageCoaching->coaching_description = $request->coaching_description;
        $homepageCoaching->save();

        return redirect()->back()->with('success', 'Homepage coaching updated successfully');
    }
}
