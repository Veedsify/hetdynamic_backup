<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_text_1',
        'banner_text_2',
        'banner_text_3',
        'banner_image_1',
        'banner_image_2',
        'banner_image_3'
    ];
}
