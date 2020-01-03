@extends('layouts.app')

@section('content')

    @component('layouts.component.title')
        {{ __('text.Repor a password') }}
    @endcomponent

    <div class="container_form">
        <div class="wrapper_form">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <ul>
                    <li class="form-row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('text.E-Mail:') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    </li>
                    @error('email')
                    <li class="form-row">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </li>
                    @enderror
                    <li class="form-row"> 
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('text.Password') }}:</label>
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
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </li>
                    <li class="form-row">
                        <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@endsection
