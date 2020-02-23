@extends('layouts.front')

@section('content')
<section class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar pt-5">
            <div class="sidebar-sticky">
                <span>Todas as Categorias</span>
                <ul class="navbar-nav flex-column">
                    @foreach($categories as $c)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category.single',  ['slug' => $c->slug])}}">
                            {{$c->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>

        <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="container">
                <div class="p-4 align-self-center">
                    <form action="{{ route('search') }}" method="GET" class="py-4">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control" name="busca" id="busca" placeholder="Buscar por nome" aria-label="busca"
                                aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-4">
                        @if($store->logo)
                        <img src="{{asset('storage/' . $store->logo)}}" alt="Logo da loja {{$store->name}}" class="img-fluid">
                        @else
                        <img src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-8">
                        <h1 class="pt-4">{{$store->name}}</h1>
                        <p>{{$store->description}}</p>
                        <div>
                            <strong>Contatos:</strong>
                            <span>{{$store->phone}} | {{$store->mobile_phone}}</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                        <h3 class="pb-2">Produtos desta loja</h3>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <div class="container">
                    @if($products->count())
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
                    {{$products->links()}}
                    @else
                    <h3 class="alert alert-warning">Nenhum produto encontrado para esta loja</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection