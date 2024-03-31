<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\OfficeAddress;
use App\Models\OpenHour;
use Illuminate\Http\Request;

class OfficeAddressController extends Controller
{
    public function showOfficeAddressPage()
    {
        $officeAddress = Office::with('openHours')->get();
        return view('admin.office', [
            'officeAddress' => $officeAddress
        ]);
    }

    public function addOfficeAddress(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'day' => 'required|array',       // 'day' should be required and an array
            'day.*' => 'required',           // Each day element in the array is required
            'starttime' => 'required|array', // 'starttime' should be required and an array
            'starttime.*' => 'required|date_format:H:i',  // Validate each starttime element as a time
            'endtime' => 'required|array',   // 'endtime' should be required and an array
            'endtime.*' => 'required|date_format:H:i',    // Validate each endtime element as a time
        ]);


        $filePath = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('custom/office'), $imageName);
            $filePath = 'custom/office/' . $imageName;
        }

        $officeAddress = new Office();
        $officeAddress->country = $request->country;
        $officeAddress->address = $request->address;
        $officeAddress->phone = $request->phone;
        $officeAddress->image = $filePath;
        $officeAddress->email = $request->email;
        $officeAddress->save();

        foreach ($request->day as $index => $day) {
            $officeAddress->openHours()->create([
                'day' => $day,
                'open' => date('Y-m-d H:i:s', strtotime($request->starttime[$index])),
                'close' => date('Y-m-d H:i:s', strtotime($request->endtime[$index])),
            ]);
        }

        return redirect()->back()->with('success', 'Office address added successfully');
    }

    public function editOfficeAddress(Request $request, $id)
    {
        $request->validate([
            'country' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'day' => 'required|array',       // 'day' should be required and an array
            'day.*' => 'required',           // Each day element in the array is required
            'starttime' => 'required|array', // 'starttime' should be required and an array
            'starttime.*' => 'required|date_format:H:i',  // Validate each starttime element as a time
            'endtime' => 'required|array',   // 'endtime' should be required and an array
            'endtime.*' => 'required|date_format:H:i',    // Validate each endtime element as a time
        ]);

        $officeAddress = Office::find($id);
        $officeAddress->country = $request->country;
        $officeAddress->address = $request->address;
        $officeAddress->phone = $request->phone;
        $officeAddress->email = $request->email;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('custom/office'), $imageName);
            $filePath = 'custom/office/' . $imageName;
            $officeAddress->image = $filePath;
        }
        $officeAddress->save();
        $officeAddress->openHours()->delete();
        foreach ($request->day as $index => $day) {
            $officeAddress->openHours()->create([
                'day' => $day,
                'open' => date('Y-m-d H:i:s', strtotime($request->starttime[$index])),
                'close' => date('Y-m-d H:i:s', strtotime($request->endtime[$index])),
            ]);
        }

        return redirect()->back()->with('success', 'Office address updated successfully');
    }
}
