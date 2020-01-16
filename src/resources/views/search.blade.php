@extends('layouts.front')

@section('content')
<form action="">
    <input type="text" name="busca" id="busca" placeholder="Buscar...">
    <button type="submit" id="lupa" value="buscar">Buscar</button>
</form>
@if(count($products) == 0)
<div class="row">
    <h1>Nenhum produto encontrado com o nome pesquisado.</h1>
</div>
@else
<div class="row front">
    @foreach($products as $product)
    <div class="col-md-4">
        <div class="card" style="width: 100%;">
            @if($product->photos->count())
            <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt=""  class="card-img-top">
            @else
            <img src="{{asset('assets/img/no-photo.jpg')}}" alt=""  class="card-img-top">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{$product->name}}</h2>
                <p class="card-text">{{$product->description}}</p>
                <h3>R$ {{number_format($product->price, '2', ',', '.')}}</h3>
                <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-success">Ver Produto</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection