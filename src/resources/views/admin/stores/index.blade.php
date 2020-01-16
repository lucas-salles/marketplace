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

@if(!$store)
<a href="{{route('admin.stores.create')}}" class="btn btn-primary mt-2">Criar Loja</a>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Total de Produtos</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->products->count()}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endif
@endsection