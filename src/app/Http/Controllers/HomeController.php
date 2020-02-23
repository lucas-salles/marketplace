<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\Store;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(9)->orderBy('id', 'DESC')->get();
        $stores = Store::limit(3)->orderBy('id', 'DESC')->get();

        $productsCarousel = Product::limit(3)->orderBy('id', 'DESC')->get();
        

        return view('welcome', compact('products', 'stores', 'productsCarousel'));
    }

    public function single($slug)
    {
        $product = Product::whereSlug($slug)->first();

        return view('single', compact('product'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $products = Product::where('name', 'LIKE', "%{$data['busca']}%")->get();
        return view('search', compact('products'));
    }
}
