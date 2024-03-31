<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class WorkPermitController extends Controller
{
    //
    public function previousPermit()
    {
            return View::make("admin.work-permit");

    }
    public function newWorkPermit()
    {
            return View::make("admin.new-work-permit");

    }

}
