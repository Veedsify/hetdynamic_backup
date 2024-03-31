<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmigrationHighlight extends Model
{
    use HasFactory;

    protected $fillable = ['feature_context', 'feature_title', 'immigration_service_id'];

    public function immigrationService()
    {
        return $this->belongsTo(ImmigrationService::class);
    }
}
