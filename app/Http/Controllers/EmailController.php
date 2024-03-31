<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function email() {
        return view("admin.email");
    }
    public function support() {
        return view("admin.support-mail");
    }
}
