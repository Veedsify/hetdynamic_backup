<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageUploaderController;
use App\Models\PageTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/image-upload", [ImageUploaderController::class, 'uploadImage']);
Route::post('/categories', [CategoryController::class, 'getall']);

Route::post('/get_browsers_view_today', function () {
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

    return response()->json([
        $chromeViewsToday,
        $firefoxViewsToday,
        $edgeViewsToday,
        $safariViewsToday,
    ]);
});


Route::post('/get_this_week_visitor', function () {
    $viewsByDayOfWeek = PageTracker::select(DB::raw('DAYOFWEEK(created_at) as day_of_week'), DB::raw('COUNT(*) as views'))
        ->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay()) // Filter records for the last 7 days
        ->groupBy('day_of_week')
        ->orderByRaw('DAYOFWEEK(created_at)') // Ensure Sunday is the first day of the week
        ->get();

    $dayNames = [
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
    ];

    $viewsByDayOfWeekResult = [];
    $currentDayOfWeek = (Carbon::now()->dayOfWeek - 1 + 7) % 7; // Start from Sunday (0)

    for ($i = 0; $i < 7; $i++) {
        $day = ($currentDayOfWeek + $i) % 7;
        $dayName = $dayNames[$day];
        $viewsByDayOfWeekResult[$dayName] = isset($viewsByDayOfWeekResult[$dayName]) ? $viewsByDayOfWeekResult[$dayName] : 0;
    }

    return response()->json($viewsByDayOfWeekResult);
});


