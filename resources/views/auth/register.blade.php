@extends('layouts.app')

@section('content')

<div class="container_titulo">
    <span class="hr_esquerda">
        <span class="hr"></span>
    </span>
    <h4 class="titulo">{{ __('Registo') }}</h4>
    <span class="hr_direita">
        <span class="hr"></span>
    </span>
</div>

<div class="container_form">
    <div class="wrapper_form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <ul>
            <li class="form-row">    
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </li>
            @error('name')
                <li class="form-row">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </li>
            @enderror
            <li class="form-row"> 
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            </li>
            @error('email')
                <li class="form-row">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </li>
            @enderror
            <li class="form-row"> 
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </li>
            @error('password')
                <li class="form-row"> 
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </li>
            @enderror
            <li class="form-row"> 
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </li>
            <li class="form-row"> 
                <h6>{{ __('*Precisa defenir uma password com mais de 8 caracteres')}}</h6>
            </li>
            <li class="form-row">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            </li>
            </ul>
        </form>
    </div>
</div>
@endsection
