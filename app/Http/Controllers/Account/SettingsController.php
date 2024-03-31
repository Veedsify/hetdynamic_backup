<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    //
    public function setting()
    {
        $user = auth()->user();

        return View::make("account.settings");
    }
    public function updateProfile(Request $request)
    {
        // $user = User::find(auth()->user()->id); // Retrieve the authenticated user

        // Validate the form data
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar_name = $avatar->getClientOriginalName();
            $avatar->move(public_path('custom/user'), $avatar_name);
            $filePath = 'custom/user/' . $avatar_name;
        }


        User::where('id', '=', auth()->user()->id)->update([
            'fullname' => $request->input('fullname'),
            'phone' => $request->input('phone'),
            'avatar' => isset($filePath) ?   $filePath : User::find(auth()->user()->id)->avatar
        ]);

        $user =   User::find(auth()->user()->id);

        Notification::create([
            'type' => 'account',
            'title' => ucwords(explode(" ", $user->fullname)[0]) . ' changed settings on ' . GlobalSetting::first()->site_name,
            'description' =>  'Your Profile settings has been updated',
            'seen' => 'unread',
            'user_id' => $user->id,
            'image' => "custom/notifications/profile.svg",
            'url' => '',
        ]);
        // Redirect back with a success message
        return redirect()->route('account.setting')->with('success', 'Profile updated successfully.');
    }
}
