<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactpageBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_banner_title',
        'contact_banner_image',

    ];
}
