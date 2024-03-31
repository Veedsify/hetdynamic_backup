<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //
    public function user()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return View::make('admin.users', ['users' => $users]);
    }

    public function upgradeUser(Request $request, $userId)
    {

        $user = User::find($userId);
        // Update the user's role
        $user->role = $request->role;
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function deleteUser($id)
    {
        try {

            $user = User::find($id);
            $file = public_path($user->avatar);
            if (file_exists($file)) {
                unlink($file);
            }
            $user->delete();
            return redirect()->back()->with('success', 'user member deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}


// Address: Head office: No 3 Akpoguma Street, Kilo Bus Stop Surulere Lagos.
// Branch office: No 45, Nouakchott  Street, Wuse Zone 1, Abuja Nigeria.
// Phone: 08087775056,07017322039
// Email: admin@hetdynamic.com, info@hetdynamic.com
