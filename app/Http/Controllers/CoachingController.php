<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoachingController extends Controller
{
    //
    public function showCoachingPage(){
        return view("pages.coaching");
    }

    public function showCoachingPagesDetails($pageId){
        return view("pages.coaching-details");
    }
}
