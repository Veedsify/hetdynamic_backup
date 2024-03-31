<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_comment_id',
        'user_id',
        'comment',
        'status',
    ];

    public function comment()
    {
        return $this->belongsTo(BlogComment::class);
    }

    
}
