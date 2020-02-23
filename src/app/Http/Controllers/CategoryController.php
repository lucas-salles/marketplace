<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $products = $category->products()->paginate(9);

        return view('category', compact('category', 'products'));
    }
}
