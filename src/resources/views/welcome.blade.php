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
                            <h3>R$ {{number_format($productCarousel->price, '2', ',', '.')}}</h3>
                            <a href="{{route('product.single', ['slug' => $productCarousel->slug])}}" class="btn btn-success">Ver Produto</a>
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
        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar pt-5">
            <div class="sidebar-sticky">
                <span>Todas as Categorias</span>
                <ul class="navbar-nav flex-column">
                    @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category.single', ['slug' => $category->slug])}}">
                            {{$category->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>

        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="container my-4">
                <div class="p-4 align-self-center">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control" name="busca" id="busca" placeholder="Buscar por nome" aria-label="busca"
                                aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                @if($product->photos->count())
                                <img class="card-img-top" src="{{asset('storage/' . $product->photos->first()->image)}}" alt="Card image cap">
                                @else
                                <img class="card-img-top" src="{{asset('assets/img/no-photo.jpg')}}" alt="Card image cap">
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

                    <div class="row">
                        <div class="col-12">
                            <h2>Lojas Destaque</h2>
                            <hr>
                        </div>
                        @foreach($stores as $store)
                        <div class="col-4">
                            @if($store->logo)
                            <img src="{{asset('storage/' . $store->logo)}}" alt="Logo da loja {{$store->name}}" class="img-fluid">
                            @else
                            <img src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo" class="img-fluid">
                            @endif
                            <h3>{{$store->name}}</h3>
                            <p>{{$store->description}}</p>
                            <a href="{{route('store.single', ['slug' => $store->slug])}}" class="btn btn-sm btn-success">Ver Loja</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- <div class="container pt-5">
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
</div> -->



@section('scripts')
<script>
    $('.carousel').carousel({
        interval: 1500
    })
</script>
@endsection
@endsection