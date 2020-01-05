@extends('layouts.app')

@section('content')

    @component('layouts.component.title')
        {{ __('text.Reset Password') }}
    @endcomponent

    <div class="container_form">
        <div class="wrapper_form">
            <ul>
                <li class="form-row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </li>
            </ul>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <ul>
                    <li class="form-row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('text.E-Mail') }}</label>
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
                        <button type="submit" class="btn btn-primary">{{ __('text.Envia email para repor a password') }}</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@endsection
