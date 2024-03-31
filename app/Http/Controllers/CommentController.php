<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Notification;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function newComments(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "message" => "required"
        ]);

        $article = Blog::where("slug", $id)->first();
        $article->comments()->create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "comment" => $request->input("message")
        ]);

        Notification::create([
            'type' => 'comment',
            'title' => 'Comment on Article',
            'description' =>  $request->name . ' commented on an article',
            'seen' => 'unread',
            'image' => "custom/notifications/comment.svg",
            'url' => route("blog.details", $article->slug),
        ]);

        return redirect()->back()->with("message", "Comment added successfully");
    }
}
