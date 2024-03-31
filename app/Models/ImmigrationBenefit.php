<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmigrationBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['benefits', 'immigration_service_id'];

    public function immigrationService()
    {
        return $this->belongsTo(ImmigrationService::class);
    }
}
