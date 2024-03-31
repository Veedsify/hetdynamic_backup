<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacypageBanner;
use App\Models\PrivacypageContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PrivacyController extends Controller
{
    //
    public function showPrivacyPage()
    {
        $privacyBanner  = PrivacypageBanner::first();
        $privacyContent  = PrivacypageContent::first();
        return View::make('pages.privacy-policy',[
            "privacyBanner"=>$privacyBanner,
            "privacyContent"=>$privacyContent,
        ]);
    }
}
