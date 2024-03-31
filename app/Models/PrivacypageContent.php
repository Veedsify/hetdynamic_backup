<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacypageContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'privacy_title',
        'privacy_description'
    ];
}
