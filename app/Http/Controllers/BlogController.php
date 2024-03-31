<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\HomepageBanner;
use App\Models\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    public function showBlogPage(Request $request)
    {
        $query = $request->get('page');
        $blogs = Blog::where("status", true)->orderByDesc("created_at")->paginate(9);
        $blogBanner = HomepageBanner::first()->banner_image_1;
        return view("pages.blog", [
            "blogs" => $blogs,
            'query' => $query,
            "blogBanner" => $blogBanner
        ]);
    }

    public function showBlogPagesDetails($postId)
    {
        $article = Blog::where([
            "slug" => $postId,
            "status" => true
        ])->first();

        if ($article === null) {
            return abort(404);
        }
        $comments = $article->comments;
        $comments = $comments->sortByDesc("created_at");
        $paginateComments = $comments->forPage(1, 2);
        $relatedArticles = Blog::where("category", $article->category)->where("id", "!=", $article->id)->limit(3)->get();
        $categories = Category::all();
        return view("pages.blog-details", [
            "article" => $article,
            "comments" => $paginateComments,
            "relatedArticles" => $relatedArticles,
            "categories" => $categories
        ]);
    }

    public function createBlog()
    {
        $categories = Category::all();
        return View::make("admin.new-article", [
            "categories" => $categories
        ]);
    }

    public function articleBlog()
    {
        $blogs = Blog::paginate(5)->sortByDesc("created_at");
        return view("admin.all-article", [
            "articles" => $blogs
        ]);
    }

    public function articleComment()
    {
        $comments = BlogComment::all()->sortByDesc("created_at");
        return view("admin.comment", [
            "comments" => $comments
        ]);
    }

    public function deleteComment($commentId)
    {
        try {
            $comment = BlogComment::find($commentId);
            $comment->delete();
            return redirect()->back()->with("success", "Comment Deleted Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "An Error Occurred");
        }
    }
    public function deleteBlog($blogSlug)
    {
        try {
            $blogs = Blog::where("slug", $blogSlug)->first();
            $image = public_path($blogs->image);
            if (file_exists($image)) {
                unlink($image);
            }
            $blogs->delete();
            return redirect()->back()->with("success", "Article Deleted Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "An Error Occurred");
        }
    }

    public function newarticle(Request $request)
    {
        try {
            $request->validate([
                "title" => "required",
                "category" => "required",
                "html" => "required",
                "description" => "required",
                "status" => "required",
                "tags" => "required",
                "file" => "required|image|mimes:jpeg,png,jpg,gif,svg",
            ]);

            $file = $request->file("file");
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path("custom/blog"), $fileName);
            $filepath = "custom/blog/" . $fileName;
            $imageUploadHandler = new ImageUploader();
            $imageUploadHandler->image_name = $fileName;
            $imageUploadHandler->image_path = $filepath;
            $imageUploadHandler->save();

            $checkSlug = Blog::where("slug", Str::slug($request->get("title")))->first();

            if ($checkSlug && $checkSlug->count() > 0) {
                $newSlug = Str::slug($request->get("title")) . "-" . rand(1, 100);
            }

            //New Blog
            $article = new Blog();
            $article->title = $request->get("title");
            $article->category = $request->get("category");
            $article->description = $request->get("description");
            $article->slug = isset($newSlug) ? $newSlug : Str::slug($request->get("title"));
            $article->content = $request->html;
            $article->content_html = $request->html;
            $article->tags = $request->get("tags");
            $article->user_id = auth()->user()->id;
            $article->status = $request->get("status") == "active" ? true : false;
            $article->image = $filepath;
            $article->meta_title = $request->get("title");
            $article->meta_description = $request->get("description");
            $article->meta_keywords = $request->get("tags");

            if ($article->save()) {
                return redirect()->back()->with("success", "Article Created Successfully");
            } else {
                Log::error("An Error Occurred");
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "An Error Occurred");
        }
    }

    public function editarticle(Request $request, $slug)
    {
        try {
            $request->validate([
                "title" => "required",
                "category" => "required",
                "html" => "required",
                "description" => "required",
                "status" => "required",
                "tags" => "required",
                "file" => "image|mimes:jpeg,png,jpg,gif,svg",
            ]);

            if ($request->hasFile("file")) {
                $file = $request->file("file");
                $fileName = time() . "." . $file->getClientOriginalExtension();
                $file->move(public_path("custom/blog"), $fileName);
                $filepath = "custom/blog/" . $fileName;
                $imageUploadHandler = new ImageUploader();
                $imageUploadHandler->image_name = $fileName;
                $imageUploadHandler->image_path = $filepath;
                $imageUploadHandler->save();
            }

            $checkSlug = Blog::where("slug", $slug)->first();
            if ($checkSlug->slug === $slug && $checkSlug->title === $request->get("title")) {
                $newSlug = $slug;
            } else {
                $newSlug = Str::slug($request->get("title")) . "-" . rand(1, 100);
            }
            $article = Blog::where("slug", $slug)->first();
            $article->title = $request->get("title");
            $article->category = $request->get("category");
            $article->description = $request->get("description");
            $article->image = isset($filepath) ? $filepath : $article->image;
            $article->slug = $newSlug;
            $article->content = $request->html;
            $article->content_html = $request->html;
            $article->tags = $request->get("tags");
            $article->user_id = auth()->user()->id;
            $article->status = $request->get("status") == "active" ? true : false;
            $article->meta_title = $request->get("title");
            $article->meta_description = $request->get("description");
            $article->meta_keywords = $request->get("tags");

            if ($article->save()) {
                return redirect(route("admin.blog.edit", $newSlug))->with("success", "Article Updated Successfully");
            } else {
                Log::error("An Error Occurred");
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "An Error Occurred");
        }
    }

    public function getBlogDetailsBlock(Request $request)
    {
        $slug = $request->slug;
        $blog = Blog::where("slug", $slug)->first();
        return response()->json([
            "blocks" => $blog->content
        ]);
    }

    public function editBlog($blogId)
    {
        $blog = Blog::where("slug", $blogId)->first();
        $categories = Category::all();
        return View::make("admin.edit-article", [
            "blog" => $blog,
            "categories" => $categories
        ]);
    }
}
