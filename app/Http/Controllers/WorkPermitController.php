<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkPermitController extends Controller
{
    //
    public function showWorkPermitPagesDetails($pageId)
    {
        return view('pages.workpermit-details', ['pageId' => $pageId]);
    }

    public function showWorkPermitPage(Request $request)
    {
        return view("pages.workpermit");
    }
}
