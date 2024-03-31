<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_email',
        'default_mail_address',
        'support_mail_address',
        'admin_phone',
        'admin_address',
        'site_logo',
        'site_favicon',
        'site_name',
        'site_description',
        'site_facebook',
        'site_twitter',
        'site_url',
        'site_youtube',
        'site_address',
        'site_phone',
        'site_email',
        'site_instagram',
        'site_linkedin',
        'site_pinterest',
        'mail_address',
        'mail_host'
    ];
}
