<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    //
    public function getNotifications()
    {
        $notifications = Notification::where([
            'user_id' => NULL,
        ])->orderBy('created_at', 'desc')->get();
        return View::make("admin.notification", [
            "allNotifications" => $notifications
        ]);
    }

    public function notificationView($id)
    {
        $notification = Notification::find($id);
        $notification->seen = 'read';
        $notification->save();

        return redirect()->route("admin.notification")->with('success', 'Notification marked as read');
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
