@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div>{{ __('Verifica o teu email') }}</div>
    </div>

    @if (session('resent'))
    <ul class="alert">           
        <li class="alert-success">
            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
        </li>
    </ul>
    @endif
    <div class="wrapper">
        <div>{{ __('Antes de prosseguir, verifique seu e-mail para um link de verificação.') }}</div>
    </div>
    <div class="wrapper">
        <div>{{ __('Se você não recebeu o email') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para solicitar outro') }}</a>.</div>
    </div>

@endsection
