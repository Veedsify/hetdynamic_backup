<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyController extends Controller
{
    //
    public function caseStudy()
    {
        return view("admin.all-cases");
    }
    public function newStudy()
    {
        return view("admin.new-study");
    }
}
