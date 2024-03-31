<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSupport extends Model
{
    use HasFactory;
    protected $fillable = [
        'support_title',
        'support_feature_1',
        'support_feature_2',
        'support_feature_3',
        'support_image',
        'support_video'
    ];
}
