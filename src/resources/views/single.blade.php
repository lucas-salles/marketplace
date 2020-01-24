@extends('layouts.front')

@section('stylesheets')
<!-- jQuery 1.8 or later, 33 KB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Fotorama from CDNJS, 19 KB -->
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
@endsection

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-6">
            @if($product->photos->count())
            <div class="fotorama" data-nav="thumbs">>
                @foreach($product->photos as $photo)
                <img src="{{asset('storage/' . $photo->image)}}">
                @endforeach
            </div>
            @else
            <img src="{{asset('assets/img/no-photo.jpg')}}" alt=""  class="card-img-top">
            @endif
        </div>
        <div class="col-6">
            <div class="col-md-12">
                <h2>{{$product->name}}</h2>
                <p><{{$product->description}}/p>
                <h3>R$ {{number_format($product->price, '2', ',', '.')}}</h3>
                <span>Loja: {{$product->store->name}}</span>
            </div>
            <div class="product-add col-md-12">
                <hr>
                <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input type="number" name="product[amount]" class="form-control col-md-2" value="1">
                    </div>
                    <button type="submit" class="btn btn-lg btn-danger">Comprar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <hr>
            {{$product->body}}
        </div>
    </div>
</div>
@endsection