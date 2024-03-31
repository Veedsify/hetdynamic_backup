<?php

namespace App\Http\Controllers;

use App\Models\HomepageBanner;
use Illuminate\Http\Request;
use App\Models\ImmigrationService;
use App\Models\Office;
use App\Models\Service;
use Illuminate\Support\Facades\Log;

class ResidencyController extends Controller
{
    //
    public function showServicesPagesDetails($serviceId, $pageId)
    {
        $immigrationService = ImmigrationService::with([
            'highlights',
            'benefits',
            'requirements',
            'secondRequirements',
            'mandatoryRequirements',
            'timelineOfEvents',
        ])->where([
            'slug' => $pageId,
            'service' => $serviceId,
            'status' => true
        ])->first();
        $officeAddress = Office::with('openHours')->get();

        if (!$immigrationService) {
            abort(404);
        }

        return view('pages.servicesDetails', [
            'pageId' => $pageId,
            "officeAddress" => $officeAddress,
            'thisService' => $immigrationService,
        ]);
    }

    public function showServicePage(Request $request, $serviceId)
    {
        $services = ImmigrationService::where([
            'service' => $serviceId,
            'status' => true
        ])->get();

        $serviceData = Service::where('slug', $serviceId)->first();
        $bannerDetails  = HomepageBanner::first();

        if (!$serviceData) {
            abort(404);
        }

        return view("pages.servicepage", [
            'services' => $services,
            'serviceId' => $serviceId,
            'bannerDetails' => $bannerDetails,
            'serviceData' => $serviceData
        ]);
    }

    public function showServliceListPage(Request $request)
    {
        return view("pages.residency");
    }
}
