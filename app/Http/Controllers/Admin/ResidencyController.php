<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\ImmigrationService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\View;

class ResidencyController extends Controller
{
    public function newService()
    {
        $countries = Country::all();
        return View::make("admin.newService", [
            'countries' => $countries
        ]);
    }

    public function showImmigrationEditPage($serviceId)
    {
        $service = ImmigrationService::with([
            'highlights',
            'benefits',
            'requirements',
            'secondRequirements',
            'mandatoryRequirements',
            'timelineOfEvents',
        ])->where([
            ['slug', '=', $serviceId]
        ])->first();

        if (!$service) {
            abort(404);
        }

        $countries = Country::all();
        $allService = Service::all();
        return view('admin.editServices', [
            'service' => $service,
            'countries' => $countries,
            'allService' => $allService
        ]);
    }

    public function showImmigrationService()
    {
        $service = ImmigrationService::orderBy('id', 'desc')->get();

        if (!$service) {
            abort(404);
        }

        return view('admin.allServices', [
            'services' => $service
        ]);
    }
}
