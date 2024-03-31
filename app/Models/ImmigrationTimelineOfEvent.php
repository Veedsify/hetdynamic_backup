<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmigrationTimelineOfEvent extends Model
{
    use HasFactory;

    protected $fillable = ['duration', 'plan', 'timeline_context', 'immigration_service_id'];

    public function immigrationService()
    {
        return $this->belongsTo(ImmigrationService::class);
    }
}
