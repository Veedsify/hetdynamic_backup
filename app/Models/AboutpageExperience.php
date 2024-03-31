<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutpageExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'experience_title',
        'experience_sub_title',
        'experience_description',
        'experience_feature_1' ,
        'experience_feature_2',
        'experience_years',
        'experience_image_1',
        'experience_image_2',
    ];
}
