<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmigrationService extends Model
{
    use HasFactory;
    protected $fillable =
    ['title', 'featured_image', 'slug', 'highlight_features_active', 'service_features_active', 'benefits_section_active', 'requirements_section_1_active', 'requirements_section_2_active', 'option_1_active', 'option_2_active', 'option_3_active', 'extra_requirements_active', 'mandatory_requirements_active', 'timeline_of_events_active', 'sponsorship_active', 'services_title', 'services_first_content', 'services_second_content', 'benefits_title', 'requirements_section_1_image', 'requirements_section_1_title', 'requirements_section_1_subtitle', 'requirements_section_2_image', 'requirements_section_2_title', 'requirements_section_2_subtitle', 'option_1_title', 'option_1_content', 'option_1_image', 'option_2_title', 'option_2_content', 'option_2_image', 'option_3_title', 'option_3_content', 'option_3_image', 'extra_requirements_title', 'extra_requirements_content', 'extra_requirements_image', 'mandatory_requirements_title', 'timeline_of_events_title', 'sponsorship_title', 'sponsorship_image', 'sponsorship_content', 'tags', 'country', 'service', 'status'];

    public function mandatoryRequirements()
    {
        return $this->hasMany(MandatoryRequirement::class);
    }

    public function secondRequirements()
    {
        return $this->hasMany(ImmigrationSecondRequirement::class);
    }
    public function requirements()
    {
        return $this->hasMany(ImmigrationRequirement::class);
    }

    public function benefits()
    {
        return $this->hasMany(ImmigrationBenefit::class);
    }

    public function timelineOfEvents()
    {
        return $this->hasMany(ImmigrationTimelineOfEvent::class);
    }

    public function highlights()
    {
        return  $this->hasMany(ImmigrationHighlight::class);
    }
}
