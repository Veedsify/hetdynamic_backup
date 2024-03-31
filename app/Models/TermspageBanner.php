<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermspageBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'terms_banner_title',
        'terms_banner_image'
    ];
}
