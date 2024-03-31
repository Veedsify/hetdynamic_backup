<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CitizenshipController extends Controller
{
    //


    public function citizenship()
    {
            return view::make("admin.all-citizenship");

    }
    public function newCitizen()
    {
            return view::make("admin.new-citizenship");

    }
}
