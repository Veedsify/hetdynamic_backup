<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getall()
    {
        return response()->json([
            "categories" => Category::all()
        ]);
    }
}
