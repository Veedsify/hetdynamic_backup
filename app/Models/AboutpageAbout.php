<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutpageAbout extends Model
{
    use HasFactory;
    protected $fillable = [
        'about_us_title',
        'about_us_sub_title_1',
        'about_us_sub_title_2',
        'about_us_description_1' ,
        'about_us_description_2',
        'about_us_feature_1',
        'about_us_feature_2',
    ];
}
