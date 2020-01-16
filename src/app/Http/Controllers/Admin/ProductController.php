<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Store;
use App\Category;
use App\Http\Requests\ProductRequest;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;
        if(!is_null($userStore)) {
            $products = $userStore->products()->paginate(10);
        } else {
            $products = null;
        }
        

        return view('admin.products.index', compact('products', 'userStore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);

        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        
        $product->categories()->sync($categories);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }

        // flash('Produto Criado com Sucesso')->success();
        // return redirect()->route('admin.products.index');
        return redirect(route('admin.products.index'))->with('success', 'Produto Criado com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = Product::findOrFail($product);
        $categories = Category::all(['id', 'name']);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);

        $product = Product::find($product);
        $product->update($data);
        
        if(!is_null($categories)) {
            $product->categories()->sync($categories);
        }

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }

        // flash('Produto Atualizado com Sucesso')->success();
        // return redirect()->route('admin.products.index');
        return redirect(route('admin.products.index'))->with('success', 'Produto Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();

        // flash('Produto Removido com Sucesso')->success();
        // return redirect()->route('admin.products.index');
        return redirect(route('admin.products.index'))->with('success', 'Produto Removido com Sucesso');
    }
}
