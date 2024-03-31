<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageConsulting extends Model
{
    use HasFactory;

    protected $fillable = [
        'consulting_title',
        'consulting_description',
        'consulting_feature_1',
        'consulting_feature_2',
        'consulting_desc_1',
        'consulting_desc_2',
        'consulting_image',
        'consulting_image_2'
    ];
}
