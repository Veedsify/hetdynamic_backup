<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmigrationSecondRequirement extends Model
{
    use HasFactory;

    protected $fillable = ['requirements', 'immigration_service_id'];

    public function immigrationService()
    {
        return $this->belongsTo(ImmigrationService::class);
    }
}
