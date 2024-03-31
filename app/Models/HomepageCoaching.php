<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageCoaching extends Model
{
    use HasFactory;
    protected $fillable = [
        'coaching_title',
        'coaching_description'
    ];
}
