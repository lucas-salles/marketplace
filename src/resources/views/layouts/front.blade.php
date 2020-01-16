<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .front.row {
            margin-bottom: 40px;
        }
    </style>
    @yield('stylesheets')
</head>
<body style="padding-top: 85px;">
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">

        <a class="navbar-brand" href="{{route('home')}}">Marketplace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

        @auth
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                    <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                    <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                </li>
                <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                    <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                </li>
            </ul>
        @endauth

            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                        <form action="{{route('logout')}}" method="POST" class="logout d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Cadastre-se</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link">
                            @if(session()->has('cart'))
                            <span class="badge badge-danger">{{array_sum(array_column(session()->get('cart'), 'amount'))}}</span>
                            @endif
                            <i class="fa fa-shopping-cart fa-2x"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav> -->

    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top py-3 box-shadow mb-4">
        <a href="{{route('home')}}" class="navbar-brand">
            Marketplace
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Abrir Navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('admin.users.edit', ['user' => auth()->user()->id])}}">Atualizar Dados</a>
                        <a class="dropdown-item" href="{{route('admin.stores.index')}}">Minha Loja</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                        <form action="{{route('logout')}}" method="POST" class="logout d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Cadastre-se</a>
                </li>
                @endguest
                <li class="nav-item">
                    <a href="{{ route('cart.index') }}" class="nav-link">
                        @if(session()->has('cart'))
                        <span class="badge badge-danger">{{array_sum(array_column(session()->get('cart'), 'amount'))}}</span>
                        @endif
                        <i class="fa fa-shopping-cart fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="">
        @include('flash::message')
        @yield('content')
    </div>

    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>