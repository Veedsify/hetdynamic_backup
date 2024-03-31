<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermspageContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'terms_title',
        'terms_description'

    ];
}
