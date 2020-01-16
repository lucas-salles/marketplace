@extends('layouts.app')


@section('content')
    <h1>Atualizar Dados</h1>

    <form action="{{route('admin.users.update', ['user' => $user->id])}}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">

            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control @error('endereco') is-invalid @enderror" value="{{$user->endereco}}">

            @error('endereco')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Número</label>
            <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{$user->numero}}">

            @error('numero')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label>Complemento</label>
            <input type="text" name="complemento" class="form-control @error('complemento') is-invalid @enderror" value="{{$user->complemento}}">

            @error('complemento')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Bairro</label>
            <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" value="{{$user->bairro}}">

            @error('bairro')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" value="{{$user->cidade}}">

            @error('cidade')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{$user->estado}}">

            @error('estado')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Cep</label>
            <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" value="{{$user->cep}}">

            @error('cep')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Fone</label>
            <input type="text" name="fone" class="form-control @error('fone') is-invalid @enderror" value="{{$user->fone}}">

            @error('fone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Celular</label>
            <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{$user->celular}}">

            @error('celular')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Dados</button>
        </div>
    </form>
@endsection