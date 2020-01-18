<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(9)->orderBy('id', 'DESC')->get();
        $productsCarousel = Product::limit(3)->orderBy('id', 'DESC')->get();
        $categories = Category::all();
        return view('welcome', compact('products', 'productsCarousel', 'categories'));
    }

    public function single($slug)
    {
        $product = Product::whereSlug($slug)->first();

        return view('single', compact('product'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $data = $request->all();
        $products = Product::where('name', 'LIKE', "%{$data['busca']}%")->get();
        return view('search', compact('products', 'categories'));
    }

    public function categoryProducts($category)
    {
        $categorySelected = Category::find($category);
        $categories = Category::all();
        $products = $categorySelected->products()->paginate(9);

        return view('categoryProducts', compact('products', 'categorySelected', 'categories'));
    }
}
