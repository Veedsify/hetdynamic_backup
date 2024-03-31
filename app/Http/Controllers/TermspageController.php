<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermspageBanner;
use App\Models\TermspageContent;

class TermspageController extends Controller
{
    //
    public function updateTermsBanner(Request $request)
    {
        $request->validate([
            'terms_banner_title' => 'required',

        ]);

        if ($request->hasFile('terms_banner_image')) {
            $terms_banner_image = $request->file('terms_banner_image');
            $terms_banner_image_name = $terms_banner_image->getClientOriginalName();
            $terms_banner_image->move(public_path('custom/settings'), $terms_banner_image_name);
            $filePath = 'custom/settings/' . $terms_banner_image_name;
        }
        $terms_banner = TermspageBanner::first();

        $terms_banner->terms_banner_title = $request->terms_banner_title;

        if ($request->hasFile('terms_banner_image')) {
            $terms_banner->terms_banner_image = $filePath;
        }

        $terms_banner->save();

        return redirect()->back()->with('success', 'Terms and  Conditions Banner has been updated successfully!');
    }


    public function updateTermsContent(Request $request)
    {
        $request->validate([
            'terms_title' => 'required',
            'terms_description' => 'required',

        ]);


        $terms_content = TermspageContent::first();

        $terms_content->terms_title = $request->terms_title;
        $terms_content->terms_description = $request->terms_description;



        $terms_content->save();

        return redirect()->back()->with('success', 'Terms and  Conditions Content has been updated successfully!');
    }
}
