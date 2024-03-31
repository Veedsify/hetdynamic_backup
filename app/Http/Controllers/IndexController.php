<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Country;
use App\Models\HomepageBanner;
use App\Models\AboutpageBanner;
use App\Models\HomepageSupport;
use App\Models\HomepageCoaching;
use App\Models\HomepageConsulting;
use App\Models\AboutpageExperience;
use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Team;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    //P
    public function showIndexPage()
    {
        $blogs = Blog::query()->where("status", true)->orderBy("created_at", "desc")->limit(3)->get();
        $countries = Country::all();
        $bannerDetails  = HomepageBanner::first();
        $consultingData  = HomepageConsulting::find(1)->first();
        $supportData  = HomepageSupport::find(1)->first();
        $coachingData  = HomepageCoaching::find(1)->first();
        $aboutExperience  = AboutpageExperience::first();
        $officeAddress = Office::with('openHours')->get();
        $teams = Team::all();
        return View::make("pages.index", [
            "blogs" => $blogs,
            "countries" => $countries,
            "bannerDetails" => $bannerDetails,
            "consultingData" => $consultingData,
            "supportData" => $supportData,
            "coachingData" => $coachingData,
            "aboutExperience" => $aboutExperience,
            "teams" => $teams,
            "officeAddress" => $officeAddress
        ]);
    }
}
