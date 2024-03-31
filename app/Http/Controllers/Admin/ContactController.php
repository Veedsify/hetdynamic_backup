<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    //
    public function contact() {
        $contacts = Contact::all();
        return View::make("admin.contact", [
            "contacts" => $contacts
        ]);
    }
    public function chat() {
        return View::make("admin.chat");
    }
    public function call() {
        return View::make("admin.call-application");
    }

}
