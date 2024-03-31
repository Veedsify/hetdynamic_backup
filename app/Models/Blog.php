<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'category',
        'content',
        'content_html',
        'tags',
        'user_id',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }
}
