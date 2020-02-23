<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    public function index($slug)
    {
        $store = Store::whereSlug($slug)->first();
        $categories = Category::all();
        $products = $store->products()->paginate(9);

        return view('store', compact('store', 'categories', 'products'));
    }
}
