<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewpageBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'review_banner_title',
        'review_banner_image'
    ];
}
