<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Store;
use App\Category;
use App\Http\Requests\ProductRequest;
use App\ProductPhoto;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

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
        $user = auth()->user();

        if(!$user->store()->exists())
            return redirect(route('admin.stores.index'))->with('success', 'É preciso cadastrar produtos!');

        $products = $user->store->products()->paginate(10);
        
        return view('admin.products.index', compact('products'));
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

        $data['price'] = formatPriceToDatabase($data['price']);

        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        
        $product->categories()->sync($categories);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }

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
        $product->categories()->detach();
        $product->store()->dissociate();
        foreach ($product->photos as $photo) {
            //Remover dos arquivos
            if(Storage::disk('public')->exists($photo->image)) {
                Storage::disk('public')->delete($photo->image);
            }

            //Remover a imagem do banco
            $removePhoto = ProductPhoto::where('image', $photo->image);
            $removePhoto->delete();
        }
        $product->delete();

        return redirect(route('admin.products.index'))->with('success', 'Produto Removido com Sucesso');
    }
}
