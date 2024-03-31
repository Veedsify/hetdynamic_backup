<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewpageContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'review_title',
        'review_description',
        'review_list_1' ,
        'review_list_2',
        'review_list_3',

    ];
}
