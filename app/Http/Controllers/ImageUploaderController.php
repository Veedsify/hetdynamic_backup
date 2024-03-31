<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ImageUploader;
use Illuminate\Support\Facades\URL;

class ImageUploaderController extends Controller
{
    //
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('images'), $imageName);
        $sqlInsertImage =  ImageUploader::create([
            'image_name' => $imageName,
            'image_path' => URL::to('/images/' . $imageName)
        ]);

        if (!$sqlInsertImage) {
            return response()->json([
                'error' => 'An error occurred while uploading the image'
            ], 500);
        }

        return response()->json([
            'success' => 'You have successfully uploaded an image',
            'url' => URL::to('/images/' . $imageName)
        ], 200);
    }
}
