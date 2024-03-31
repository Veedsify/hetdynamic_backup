<?php

namespace App\Http\Controllers;

use App\Models\PageAlert;
use Illuminate\Http\Request;

class AlertsController extends Controller
{
    public function createAlerts(Request $request)
    {
        $alert = new PageAlert();
        $alert->message = $request->message;
        $alert->save();
        return response()->json($alert);
    }
}
