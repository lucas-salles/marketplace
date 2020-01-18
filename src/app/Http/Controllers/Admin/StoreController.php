<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Store;
use App\User;
use App\Http\Requests\StoreRequest;
use App\Traits\UploadTrait;

class StoreController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }
    
    public function index()
    {
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {
        $users = User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {   
        $data = $request->all();
        $user = auth()->user();

        if($request->hasFile('logo')) {
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }
        
        $store = $user->store()->create($data);

        return redirect(route('admin.stores.index'))->with('success', 'Loja Criada com Sucesso');
    }

    public function edit($store)
    {
        $store = Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();
        $store = Store::find($store);

        if($request->hasFile('logo')) {
            if(Storage::disk('public')->exists($store->logo)) {
                Storage::disk('public')->delete($store->logo);
            }
            
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

        $store->update($data);

        return redirect(route('admin.stores.index'))->with('success', 'Loja Atualizada com Sucesso');
    }

    public function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();

        return redirect(route('admin.stores.index'))->with('success', 'Loja Removida com Sucesso');
    }
}
