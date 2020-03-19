@extends('layouts.app')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div><br />
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
            <td>{{$product->store->name}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$products->links()}}
<a href="{{route('admin.products.create')}}" class="btn btn-primary mt-2">Criar Produto</a>
@endsection