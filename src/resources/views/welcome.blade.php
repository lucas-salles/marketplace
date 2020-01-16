@extends('layouts.front')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div><br />
@endif

<section class="container-fluid">
    <div class="row bg-dark text-white">

        <div class="col-lg-7 p-0">
            <div id="carouselProdutos" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($productsCarousel as $key => $productCarousel)
                    <li data-target="#carouselProdutos" data-slide-to="{{$key}}" class="@if($key==0) active @endif"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($productsCarousel as $key => $productCarousel)
                    <div class="carousel-item @if($key==0) active @endif">
                        @if($productCarousel->photos->count())
                        <img src="{{asset('storage/' . $productCarousel->photos->first()->image)}}" class="d-block w-100" alt="">
                        @else
                        <img src="{{asset('assets/img/no-photo.jpg')}}" class="d-block w-100" alt="">
                        @endif
                        <div class="carousel-caption">
                            <h3 class="display-4">{{$productCarousel->name}}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselProdutos" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselProdutos" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>

        <div class="col-lg-5 p-4 align-self-center">
            <h1 class="display-4">Produtos mais vendidos nesta semana</h1>
            <p class="lead">Os melhores produtos com os melhores preços.</p>
            <form action="{{ route('search') }}" method="GET">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="busca" id="busca" placeholder="Procure por um produto" aria-label="busca"
                        aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="container pt-5">
    <div class="row front">
        @foreach($products as $key => $product)
        <div class="col-md-4">
            <div class="card">
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
        @if(($key + 1) % 3 == 0) </div><div class="row front"> @endif
        @endforeach
    </div>
</div>

@section('scripts')
<script>
    $('.carousel').carousel({
        interval: 1500
    })
</script>
@endsection
@endsection