<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactpageBanner;
use App\Models\ContactpageLocation;

class ContactpageController extends Controller
{
    //
    public function updateContact(Request $request)
{
    $request->validate([
        'contact_banner_title' => 'required',

    ]);

    if ($request->hasFile('contact_banner_image')) {
        $contact_banner_image = $request->file('contact_banner_image');
        $contact_banner_image_name = $contact_banner_image->getClientOriginalName();
        $contact_banner_image->move(public_path('custom/settings'), $contact_banner_image_name);
        $filePath = 'custom/settings/' . $contact_banner_image_name;
    }
    $contact_banner = ContactpageBanner::first();

    $contact_banner->contact_banner_title = $request->contact_banner_title;

    if ($request->hasFile('contact_banner_image')) {
        $contact_banner->contact_banner_image = $filePath;
    }

    $contact_banner->save();

    return redirect()->back()->with('success', 'Contact Us Banner updated successfully');
}

    public function updateLocation(Request $request)
{
    $request->validate([
        'location_title' => 'required',
        'location_description' => 'required',

    ]);


    $location = ContactpageLocation::first();

    $location->location_title = $request->location_title;
    $location->location_description = $request->location_description;


    $location->save();

    return redirect()->back()->with('success', 'Location details updated successfully');
}
}
