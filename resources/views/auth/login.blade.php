@extends('layouts.app')

@section('content')

@component('layouts.component.title')
    {{ __('Login') }}
@endcomponent
<div id="main">
    <div class="container_form">
        <div class="wrapper_form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <ul>
                <li class="form-row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail:') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </li>
                    @error('email')
                        <li class="form-row">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </li>
                    @enderror
                <li class="form-row"> 
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <li class="form-row">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        <li>
                    @enderror
                </li>
                <li class="form-row" style="display:table;">
                    <label class="form-check-label" for="remember">{{ __('Lembrar-me') }}</label>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </li>
                <li class="form-row">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu-se da password?') }}
                        </a>
                    @endif
                </li>

                <li class="form-row">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </li>
                </ul>
            </form>
        </div>
    </div>
</div>
@endsection
