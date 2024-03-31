<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteCertificate;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function certificates()
    {
        $certificates = SiteCertificate::all()->sortByDesc('created_at');
        return view('admin.certificates', [
            'certificates' => $certificates
        ]);
    }

    public function newCertificate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/custom/certificates');
            $image->move($destinationPath, $name);
            $filePatth = '/custom/certificates/' . $name;
        }

        $certificate = new SiteCertificate();
        $certificate->name = $request->name;
        $certificate->description = $request->description;
        $certificate->image = $filePatth;
        $certificate->save();

        return redirect()->back()->with('success', 'Certificate added successfully');
    }

    public function deleteCertificate($id)
    {
        //Delete File
        $certificate = SiteCertificate::find($id);
        $file = public_path($certificate->image);
        if (file_exists($file)) {
            unlink($file);
        }
        $certificate->delete();
        return redirect()->back()->with('success', 'Certificate deleted successfully');
    }


    public function certificate(){


            $certificates = SiteCertificate::all()->sortByDesc('created_at');
            return view('pages.certificates', [
                'certificates' => $certificates
            ]);

    }
}
