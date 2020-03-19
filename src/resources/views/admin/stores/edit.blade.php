@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Nome Loja</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$store->name}}">

        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$store->description}}">

        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$store->phone}}">

        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="mobile_phone">Celular/Whatsapp</label>
        <input type="text" name="mobile_phone" id="phone_phone" class="form-control @error('mobile_phone') is-invalid @enderror" value="{{$store->mobile_phone}}">

        @error('mobile_phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <p><img src="{{asset('storage/' . $store->logo)}}" alt=""></p>
        <label>Logo</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">

        @error('logo')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
    </div>
</form>
@endsection

@section('scripts')
<script>
    let imPhone = new Inputmask('(99) 9999-9999')
    imPhone.mask(document.getElementById('phone'))

    let imMobilePhone = new Inputmask('(99) 99999-9999')
    imMobilePhone.mask(document.getElementById('phone_phone'))
</script>
@endsection