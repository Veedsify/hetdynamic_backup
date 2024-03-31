<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function viewcategory()
    {
        return View::make("admin.categories", [
            "categories" => Category::all()
        ]);
    }
    public function deletecategory($id)
    {
        $findBlogs =  Blog::where("category", $id);
        if ($findBlogs->count() > 0) {
            return redirect()->back()->with("error", "Can't delete this category, because it's part of an article");
        } else {
            Category::find($id)->delete();
            return redirect()->back()->with("success", "Category has been deleted successfully");
        }
    }

    public function createcategory(Request $request)
    {
        $request->validate([
            "category" => "required",
            "description" => "required"
        ]);
        Category::create([
            "name" => $request->category,
            "slug" => Str::slug($request->category),
            "description" => $request->description ?? "No description provided"
        ]);
        return redirect()->back()->with("success", "Category has been added successfully");
    }
}
