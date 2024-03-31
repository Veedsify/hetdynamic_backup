<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermspageBanner;
use App\Models\TermspageContent;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class TermsController extends Controller
{
    //
    public function showTermsPage()
    {
        $termsBanner  = TermspageBanner::first();
        $termsContent  = TermspageContent::first();

        return View::make('pages.terms',[
            "termsBanner"=>$termsBanner,
            "termsContent"=>$termsContent,
        ]);
    }

}
