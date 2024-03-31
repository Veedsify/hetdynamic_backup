<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ImmigrationBenefit;
use App\Models\ImmigrationService;
use Illuminate\Support\Facades\Log;
use App\Models\ImmigrationHighlight;
use App\Models\ImmigrationRequirement;
use App\Models\ImmigrationTimelineOfEvent;
use App\Models\ImmigrationMandatoryRequirement;
use App\Models\ImmigrationSecondRequirement;
use App\Models\MandatoryRequirement;

class ImmigrationServiceController extends Controller
{

    public function immigrationServices(Request $request)
    {
        try {

            $checkSlug = ImmigrationService::where([
                ['status', '=', true],
                ['slug', '=', Str::slug($request->title)]
            ])->get();

            $newService = new ImmigrationService();
            $newService->title = $request->title;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->featured_image = 'custom/services/' . $image_name;
            }

            $newService->slug = $checkSlug->count() > 0 ? Str::slug($request->title) . '-' . $checkSlug->count() : Str::slug($request->title);

            $newService->highlight_features_active = $request->highlight_features_active == "on" ? true : false;
            $newService->service_features_active = $request->service_features_active == "on" ? true : false;
            $newService->benefits_section_active = $request->benefits_section_active == "on" ? true : false;
            $newService->requirements_section_1_active = $request->requirements_section_1_active == "on" ? true : false;
            $newService->requirements_section_2_active = $request->requirements_section_2_active == "on" ? true : false;
            $newService->option_1_active = $request->option_1_active == "on" ? true : false;
            $newService->option_2_active = $request->option_2_active == "on" ? true : false;
            $newService->option_3_active = $request->option_3_active == "on" ? true : false;
            $newService->extra_requirements_active = $request->extra_requirements_active == "on" ? true : false;
            $newService->mandatory_requirements_active = $request->mandatory_requirements_active == "on" ? true : false;
            $newService->timeline_of_events_active = $request->timeline_of_events_active == "on" ? true : false;
            $newService->sponsorship_active = $request->sponsorship_active == "on" ? true : false;

            // Inserting Services Data
            $newService->services_title = $request->services_title;
            $newService->services_first_content = $request->services_content_1;
            $newService->services_second_content = $request->services_content_2;

            // Inserting Benefits Data
            $newService->benefits_title = $request->benefits_title;

            // Inserting Requirements Section 1 Data
            if ($request->hasFile('requirement_image')) {
                $image = $request->file('requirement_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->requirements_section_1_image = 'custom/services/' . $image_name;
            }
            $newService->requirements_section_1_title = $request->requirements_title;
            $newService->requirements_section_1_subtitle = $request->requirement_subtitle;

            // Inserting Requirements Section 2 Data
            if ($request->hasFile('requirement2_image')) {
                $image = $request->file('requirement2_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->requirements_section_2_image = 'custom/services/' . $image_name;
            }

            $newService->requirements_section_2_title = $request->requirements_title_2;
            $newService->requirements_section_2_subtitle = $request->requirement_subtitle_2;

            // Inserting Option 1 Data
            $newService->option_1_title = $request->options_1_title;
            $newService->option_1_content = $request->options_1_content;
            if ($request->hasFile('options_1_image')) {
                $image = $request->file('options_1_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->option_1_image = 'custom/services/' . $image_name;
            }

            // Inserting Option 2 Data
            $newService->option_2_title = $request->options_2_title;
            $newService->option_2_content = $request->options_2_content;
            if ($request->hasFile('options_2_image')) {
                $image = $request->file('options_2_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->option_2_image = 'custom/services/' . $image_name;
            }

            // Inserting Option 3 Data
            $newService->option_3_title = $request->options_3_title;
            $newService->option_3_content = $request->options_3_content;
            if ($request->hasFile('options_3_image')) {
                $image = $request->file('options_3_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->option_3_image = 'custom/services/' . $image_name;
            }

            // Inserting Extra Requirements Data
            $newService->extra_requirements_title = $request->extra_requirements_title;
            $newService->extra_requirements_content = $request->extra_requirements_content;
            if ($request->hasFile('extra_requirements_image')) {
                $image = $request->file('extra_requirements_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->extra_requirements_image = 'custom/services/' . $image_name;
            }

            // Inserting Mandatory Requirements Data
            $newService->mandatory_requirements_title = $request->mandatory_requirements_title;

            // Inserting Timeline of Events Data
            $newService->timeline_of_events_title = $request->timeline_of_events_title;

            // Inserting Sponsorship Data
            $newService->sponsorship_title = $request->sponsorship_title;
            $newService->sponsorship_content = $request->sponsorship_content;
            if ($request->hasFile('sponsorship_image')) {
                $image = $request->file('sponsorship_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $newService->sponsorship_image = 'custom/services/' . $image_name;
            }

            $newService->tags = $request->tags;
            $newService->country = $request->country;
            $newService->service = $request->service;
            $newService->status = $request->status == "active" ? true : false;

            $newService->save();

            // Inserting All Other Array Attributes Data
            if ($newService->highlight_features_active == true) {
                $highlight_features = $request->highlight_feature;
                for ($i = 0; $i < count($highlight_features); $i++) {
                    $newFeature = new ImmigrationHighlight();
                    $newFeature->feature_title = $request->highlight_feature[$i];
                    $newFeature->feature_context = $request->highlight_context[$i];
                    $newFeature->immigration_service_id = $newService->id;
                    $newFeature->save();
                }
            }

            if ($newService->benefits_section_active == true) {
                $serviceBenefits = $request->benefits;
                for ($i = 0; $i < count($serviceBenefits); $i++) {
                    ImmigrationBenefit::create([
                        'benefits' => $request->benefits[$i],
                        'immigration_service_id' => $newService->id,
                    ]);
                }
            }

            if ($newService->requirements_section_1_active == true) {
                $serviceRequirements = $request->requirement;
                for ($i = 0; $i < count($serviceRequirements); $i++) {
                    ImmigrationRequirement::create([
                        'requirements' => $request->requirement[$i],
                        'immigration_service_id' => $newService->id,
                    ]);
                }
            }

            if ($newService->requirements_section_2_active == true) {
                $serviceRequirements = $request->requirements2;
                for ($i = 0; $i < count($serviceRequirements); $i++) {
                    ImmigrationSecondRequirement::create([
                        'requirements' => $request->requirements2[$i],
                        'immigration_service_id' => $newService->id,
                    ]);
                }
            }

            if ($newService->mandatory_requirements_active == true) {
                $mandatoryRequirements = $request->mandatory_requirements_text;
                for ($i = 0; $i < count($mandatoryRequirements); $i++) {
                    MandatoryRequirement::create([
                        'requirements' => $request->mandatory_requirements_text[$i],
                        'requirement_context' => $request->mandatory_requirements_content[$i],
                        'immigration_service_id' => $newService->id,
                    ]);
                }
            }

            if ($newService->timeline_of_events_active == true) {
                $timelineEvents = $request->timeline_of_events_duration;
                for ($i = 0; $i < count($timelineEvents); $i++) {
                    ImmigrationTimelineOfEvent::create([
                        'duration' => $request->timeline_of_events_duration[$i],
                        'plan' => $request->timeline_of_events_plan[$i],
                        'timeline_context' => $request->timeline_of_events_content[$i],
                        'immigration_service_id' => $newService->id,
                    ]);
                }
            }

            return redirect()->route("admin.service.all")->with('success', 'Service added successfully');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function editImmigrationService(Request $request, $serviceId)
    {
        try {
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

            $service->title = $request->title;
            $newSlug = Str::slug($request->title);
            $service->slug = $newSlug == $serviceId ? $serviceId : $newSlug;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->featured_image = 'custom/services/' . $image_name;
            }

            $service->highlight_features_active = $request->highlight_features_active == "on" ? true : false;
            $service->service_features_active = $request->service_features_active == "on" ? true : false;
            $service->benefits_section_active = $request->benefits_section_active == "on" ? true : false;
            $service->requirements_section_1_active = $request->requirements_section_1_active == "on" ? true : false;
            $service->requirements_section_2_active = $request->requirements_section_2_active == "on" ? true : false;
            $service->option_1_active = $request->option_1_active == "on" ? true : false;
            $service->option_2_active = $request->option_2_active == "on" ? true : false;
            $service->option_3_active = $request->option_3_active == "on" ? true : false;
            $service->extra_requirements_active = $request->extra_requirements_active == "on" ? true : false;
            $service->mandatory_requirements_active = $request->mandatory_requirements_active == "on" ? true : false;
            $service->timeline_of_events_active = $request->timeline_of_events_active == "on" ? true : false;
            $service->sponsorship_active = $request->sponsorship_active == "on" ? true : false;

            // Inserting Services Data
            $service->services_title = $request->services_title;
            $service->services_first_content = $request->services_content_1;
            $service->services_second_content = $request->services_content_2;

            // Inserting Benefits Data
            $service->benefits_title = $request->benefits_title;

            // Inserting Requirements Section 1 Data
            if ($request->hasFile('requirement_image')) {
                $image = $request->file('requirement_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->requirements_section_1_image = 'custom/services/' . $image_name;
            }
            $service->requirements_section_1_title = $request->requirements_title;
            $service->requirements_section_1_subtitle = $request->requirement_subtitle;

            // Inserting Requirements Section 2 Data
            if ($request->hasFile('requirement2_image')) {
                $image = $request->file('requirement2_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->requirements_section_2_image = 'custom/services/' . $image_name;
            }

            $service->requirements_section_2_title = $request->requirements_title_2;
            $service->requirements_section_2_subtitle = $request->requirement_subtitle_2;

            // Inserting Option 1 Data
            $service->option_1_title = $request->option_1_title;
            $service->option_1_content = $request->options_1_content;
            if ($request->hasFile('options_1_image')) {
                $image = $request->file('options_1_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->option_1_image = 'custom/services/' . $image_name;
            }

            // Inserting Option 2 Data
            $service->option_2_title = $request->options_2_title;
            $service->option_2_content = $request->options_2_content;
            if ($request->hasFile('options_2_image')) {
                $image = $request->file('options_2_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->option_2_image = 'custom/services/' . $image_name;
            }

            // Inserting Option 3 Data
            $service->option_3_title = $request->options_3_title;
            $service->option_3_content = $request->options_3_content;
            if ($request->hasFile('options_3_image')) {
                $image = $request->file('options_3_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->option_3_image = 'custom/services/' . $image_name;
            }

            // Inserting Extra Requirements Data
            $service->extra_requirements_title = $request->extra_requirements_title;
            $service->extra_requirements_content = $request->extra_requirements_content;
            if ($request->hasFile('extra_requirements_image')) {
                $image = $request->file('extra_requirements_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->extra_requirements_image = 'custom/services/' . $image_name;
            }

            // Inserting Mandatory Requirements Data
            $service->mandatory_requirements_title = $request->mandatory_requirements_title;

            // Inserting Timeline of Events Data
            $service->timeline_of_events_title = $request->timeline_of_events_title;

            // Inserting Sponsorship Data
            $service->sponsorship_title = $request->sponsorship_title;
            $service->sponsorship_content = $request->sponsorship_content;
            if ($request->hasFile('sponsorship_image')) {
                $image = $request->file('sponsorship_image');
                $image_name = time() .  Str::random(3) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/custom/services');
                $image->move($destinationPath, $image_name);
                $service->sponsorship_image = 'custom/services/' . $image_name;
            }

            $service->tags = $request->tags;
            $service->country = $request->country;
            $service->service = $request->service;
            $service->status = $request->status == "active" ? true : false;

            $service->save();

            // Remove All Previous
            $service->highlights()->delete();
            $service->benefits()->delete();
            $service->requirements()->delete();
            $service->secondRequirements()->delete();
            $service->mandatoryRequirements()->delete();
            $service->timelineOfEvents()->delete();


            // Inserting All Other Array Attributes Data
            if ($service->highlight_features_active == true) {
                $highlight_features = $request->highlight_feature;
                for ($i = 0; $i < count($highlight_features); $i++) {
                    $newFeature = new ImmigrationHighlight();
                    $newFeature->feature_title = $request->highlight_feature[$i];
                    $newFeature->feature_context = $request->highlight_context[$i];
                    $newFeature->immigration_service_id = $service->id;
                    $newFeature->save();
                }
            }

            if ($service->benefits_section_active == true) {
                $serviceBenefits = $request->benefits;
                for ($i = 0; $i < count($serviceBenefits); $i++) {
                    ImmigrationBenefit::create([
                        'benefits' => $request->benefits[$i],
                        'immigration_service_id' => $service->id,
                    ]);
                }
            }

            if ($service->requirements_section_1_active == true) {
                $serviceRequirements = $request->requirement;
                for ($i = 0; $i < count($serviceRequirements); $i++) {
                    ImmigrationRequirement::create([
                        'requirements' => $request->requirement[$i],
                        'immigration_service_id' => $service->id,
                    ]);
                }
            }

            if ($service->requirements_section_2_active == true) {
                $serviceRequirements = $request->requirements2;
                for ($i = 0; $i < count($serviceRequirements); $i++) {
                    ImmigrationSecondRequirement::create([
                        'requirements' => $request->requirements2[$i],
                        'immigration_service_id' => $service->id,
                    ]);
                }
            }

            if ($service->mandatory_requirements_active == true) {
                $mandatoryRequirements = $request->mandatory_requirements_text;
                for ($i = 0; $i < count($mandatoryRequirements); $i++) {
                    MandatoryRequirement::create([
                        'requirements' => $request->mandatory_requirements_text[$i],
                        'requirement_context' => $request->mandatory_requirements_content[$i],
                        'immigration_service_id' => $service->id,
                    ]);
                }
            }

            if ($service->timeline_of_events_active == true) {
                $timelineEvents = $request->timeline_of_events_duration;
                for ($i = 0; $i < count($timelineEvents); $i++) {
                    ImmigrationTimelineOfEvent::create([
                        'duration' => $request->timeline_of_events_duration[$i],
                        'plan' => $request->timeline_of_events_plan[$i],
                        'timeline_context' => $request->timeline_of_events_content[$i],
                        'immigration_service_id' => $service->id,
                    ]);
                }
            }

            return redirect()->route('admin.service.edit', $newSlug)->with('success', 'Service updated successfully');
        } catch (\Exception $e) {
            Log::info($e);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
