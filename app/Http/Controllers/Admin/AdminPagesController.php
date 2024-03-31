<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\PageTracker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminPagesController extends Controller
{
    //
    public function admin()
    {
        $chromeViewsToday = PageTracker::where("browser", "chrome")
            ->whereDate("created_at", '=', now()->format('Y-m-d'))
            ->orderByDesc("created_at")
            ->count();

        $firefoxViewsToday = PageTracker::where("browser", "firefox")
            ->whereDate("created_at", '=', now()->format('Y-m-d'))
            ->orderByDesc("created_at")
            ->count();

        $safariViewsToday = PageTracker::where("browser", "safari")
            ->whereDate("created_at", '=', now()->format('Y-m-d'))
            ->orderByDesc("created_at")
            ->count();

        $edgeViewsToday = PageTracker::where("browser", "edge")
            ->whereDate("created_at", '=', now()->format('Y-m-d'))
            ->orderByDesc("created_at")
            ->count();

        $totalViewsToday = PageTracker::whereDate("created_at", '=', now()->format('Y-m-d'))->count();
        $totalViewsAlltime = PageTracker::all()->count();       


        return View::make("admin.index", [
            "users"  => User::where("role", "user")->orderByDesc("created_at")->get(),
            "chrome" => $chromeViewsToday,
            "firefox" => $firefoxViewsToday,
            "safari" => $safariViewsToday,
            "edge" => $edgeViewsToday,
            "totalViewsToday" => $totalViewsToday,
            "totalViewsAlltime" => $totalViewsAlltime,
        ]);
    }
}
