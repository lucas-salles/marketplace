@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">{{ __('Nome') }}</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nome completo" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cpf">{{ __('CPF') }}</label>
                                <input type="text" name="cpf" id="cpf" class="form-control @error('cpf') is-invalid @enderror" placeholder="xxx.xxx.xxx-xx" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
                                
                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Seu email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">{{ __('Senha') }}</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha de acesso" value="{{ old('password') }}" required autocomplete="new-password">
                            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password-confirm">{{ __('Confirmar Senha') }}</label>
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirmar senha" value="{{ old('password') }}" required autocomplete="new-password">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="endereco">{{ __('Endereço') }}</label>
                                <input type="text" name="endereco" id="endereco" class="form-control @error('endereco') is-invalid @enderror" placeholder="Nome da rua" value="{{ old('endereco') }}" required autocomplete="endereco" autofocus>
                            
                                @error('endereco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="numero">{{ __('Número') }}</label>
                                <input type="numero" name="numero" id="numero" class="form-control @error('numero') is-invalid @enderror" placeholder="Número da residência" value="{{ old('numero') }}" required autocomplete="numero" autofocus>
                            
                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="complemento">{{ __('Complemento') }} <small>(Opcional)</small></label>
                                <input type="complemento" name="complemento" id="complemento" class="form-control @error('complemento') is-invalid @enderror" placeholder="Complemento" value="{{ old('complemento') }}">
                            
                                @error('complemento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="bairro">{{ __('Bairo') }}</label>
                                <input type="text" name="bairro" id="bairro" class="form-control @error('bairro') is-invalid @enderror" placeholder="Bairro" value="{{ old('bairro') }}" required autocomplete="bairro" autofocus>
                            
                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cidade">{{ __('Cidade') }}</label>
                                <input type="text" name="cidade" id="cidade" class="form-control @error('cidade') is-invalid @enderror" placeholder="Cidade" value="{{ old('cidade') }}" required autocomplete="cidade" autofocus>
                            
                                @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3 col-6">
                                <label for="estado">{{ __('Estado') }}</label>
                                <input type="text" name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" placeholder="Estado" value="{{ old('estado') }}" required autocomplete="estado" autofocus>
                            
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3 col-6">
                                <label for="cep">{{ __('Cep') }}</label>
                                <input type="text" name="cep" id="cep" class="form-control @error('cep') is-invalid @enderror" placeholder="xxxxx-xxx" value="{{ old('cep') }}" required autocomplete="cep" autofocus>
                            
                                @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fone">{{ __('Telefone') }} <small>(Opcional)</small></label>
                                <input type="tel" name="fone" id="fone" class="form-control @error('fone') is-invalid @enderror" placeholder="Número do telefone" value="{{ old('fone') }}">
                            
                                @error('fone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="celular">{{ __('Celular') }}</label>
                                <input type="tel" name="celular" id="celular" class="form-control @error('celular') is-invalid @enderror" placeholder="Número do celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>
                            
                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                Tipo:
                                <input type="radio" name="role" id="user" value="ROLE_USER" checked>
                                <label for="user">{{ __('Usuário Comum') }}</label>

                                <input type="radio" name="role" id="owner" value="ROLE_OWNER">
                                <label for="owner">{{ __('Dono de Loja') }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
