<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'method',
        'url',
        'user_agent',
        'referrer',
        'device',
        'platform',
        'browser',
    ];
}
