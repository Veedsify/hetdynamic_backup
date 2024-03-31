<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the Log class

class CountryController extends Controller
{

    public function countries()
    {
        return view("admin.countries", [
            "countries" => Country::all()
        ]);
    }

    public function deleteCountry($id)
    {
        $image = Country::find($id)->first()->flag;
        $file = public_path($image);
        if (file_exists($file)) {
            unlink($file);
        }
        Country::find($id)->delete();
        return redirect()->back()->with("success", "Country has been deleted successfully");
    }

    public function createCountry(Request $request)
    {
        $request->validate([
            "name" => "required",
            "iso2" => "required",
            "iso3" => "required",
            "phonecode" => "required",
            "capital" => "required",
            "currency" => "required",
            "native" => "required",
            "flag" => "required|image|mimes:jpeg,png,jpg,gif,svg",
            "slogan" => "required"
        ]);

        if (Country::where("name", $request->name)->exists()) {
            return redirect()->back()->with("error", "Country already exists");
        }

        if ($request->file("flag")) {
            $file = $request->file('flag');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('custom/country'), $imageName);
            $filepath = "custom/country/" . $imageName;

            function compressAndResize($source, $destination, $quality, $width = null, $height = null)
            {
                // Create image resource from source
                $info = getimagesize($source);
                if ($info['mime'] == 'image/jpeg') {
                    $image = imagecreatefromjpeg($source);
                } elseif ($info['mime'] == 'image/gif') {
                    $image = imagecreatefromgif($source);
                } elseif ($info['mime'] == 'image/png') {
                    $image = imagecreatefrompng($source);
                } elseif ($info['mime'] == 'image/webp') {
                    $image = imagecreatefromwebp($source);
                } else {
                    return false; // Unsupported image type
                }

                // Calculate aspect ratio
                $originalWidth = imagesx($image);
                $originalHeight = imagesy($image);
                $aspectRatio = $originalWidth / $originalHeight;

                // If both width and height are specified, determine resize dimensions
                if ($width && $height) {
                    $targetAspectRatio = $width / $height;

                    if ($aspectRatio > $targetAspectRatio) {
                        // Original image is wider, crop width
                        $newWidth = $originalHeight * $targetAspectRatio;
                        $newHeight = $originalHeight;
                    } else {
                        // Original image is taller or square, crop height
                        $newWidth = $originalWidth;
                        $newHeight = $originalWidth / $targetAspectRatio;
                    }

                    // Resize the image
                    $resizedImage = imagecreatetruecolor($width, $height);
                    imagecopyresampled($resizedImage, $image, 0, 0, ($originalWidth - $newWidth) / 2, ($originalHeight - $newHeight) / 2, $width, $height, $newWidth, $newHeight);
                    $image = $resizedImage;
                }

                // Compress and save the image based on its type
                if ($info['mime'] == 'image/jpeg') {
                    imagejpeg($image, $destination, $quality);
                } elseif ($info['mime'] == 'image/gif') {
                    imagegif($image, $destination);
                } elseif ($info['mime'] == 'image/png') {
                    $pngQuality = round(($quality / 100) * 9);
                    imagepng($image, $destination, $pngQuality);
                }

                // Free up memory
                imagedestroy($image);

                return $destination;
            }


            $d = compressAndResize(
                public_path('custom/country' . DIRECTORY_SEPARATOR . $imageName),
                public_path('custom/country' . DIRECTORY_SEPARATOR . $imageName),
                25,
                200,
                200
            );
            if ($d) {
                Log::info("Image compressed successfully");
            }
        }

        Country::create([
            "name" => $request->name,
            "iso2" => $request->iso2,
            "iso3" => $request->iso3,
            "phonecode" => $request->phonecode,
            "capital" => $request->capital,
            "currency" => $request->currency,
            "native" => $request->native,
            "flag" => $filepath,
            "slogan" => $request->slogan
        ]);
        return redirect()->back()->with("success", "Country has been added successfully");
    }
}
