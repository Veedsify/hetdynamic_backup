<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    //
    public function notification()
    {
        $notifications = Notification::where("user_id", '=', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return View::make("account.notification", [
            "allNotifications" => $notifications
        ]);
    }
    public function markAllRead()
    {
        $notifications = Notification::where('seen', 'unread')->get();
        foreach ($notifications as $notification) {
            $notification->seen = 'read';
            $notification->save();
        }

        return redirect()->back()->with('success', 'All notifications marked as read');
    }
}
