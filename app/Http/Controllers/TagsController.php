<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagsController extends Controller
{
    public function showTagsPage(Request $request, $tag)
    {
        $query = $request->get('page');
        $tags = explode(',', $tag); // Convert comma-separated tags into an array
        $tags = array_map('trim', $tags); // Trim whitespace from each tag

        $tagsQuery = Blog::where(function ($query) use ($tags) {
            foreach ($tags as $tag) {
                $query->orWhere('tags', 'LIKE', '%' . $tag . '%');
            }
        })->orderByDesc("created_at")->paginate(100);

        return view("pages.tags", [
            "blogs" => $tagsQuery,
            'query' => $tag
        ]);
    }
}
