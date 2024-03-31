<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacypageBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'privacy_banner_title',
        'privacy_banner_image'
    ];
}
