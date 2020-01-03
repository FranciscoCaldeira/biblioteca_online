@extends('layouts.app')

@section('content')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt2YQVoj9SP1SC_qpYFX9iZHSJi0FHiiQ&callback=initMap" type="text/javascript"></script>
  	@component('layouts.component.title')
          {{ __('text.Contactos') }}
	@endcomponent
	
	<div class="wrapper">
		<div></div>
		<div>
			<address>
				<p>{{('Morada: Universidade da madeira 3º andar')}}</p>
				<p>{{('Código postal: 9000-082 Funchal')}}</p>
				<p>{{('Tel.: 291 999 999')}}</p>
				<p>{{('E-mail geral:')}} <a href="mailto:bibliotecaonline2004019@gmail.com">{{('bibliotecaonline2004019@gmail.com')}}</a></p>
			</address>
		</div>
		<div></div>
	</div>
    <div id="map"></div>

	<br>
	<div class="wrapper">
		<div></div>
		<div><p>{{('Escreve uma mensagem para nós:')}}</p></div>
		<div></div>
	</div>
	
	@if (count($errors)>0)
        @foreach ($errors->all() as $error)
        <ul class="alert">           
            <li class="alert-danger">
                {{$error}}
            </li>
        </ul>
        @endforeach
    @endif

    @if (session('success'))
        <ul class="alert">           
            <li class="alert-success">
                {{session('success')}}
            </li>
        </ul>
    @endif
	<div class="container_form">
		<div class="wrapper_form">
			<form method="POST" action="{{ route('add_contact') }}">
				@csrf
				<ul>
				<li class="form-row">    
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}}" required autocomplete="name" autofocus>
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
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{{ isset(Auth::user()->name) ? Auth::user()->email : '' }}}" required autocomplete="email">
				</li>
				@error('email')
					<li class="form-row">
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					</li>
				@enderror

				<li class="form-row"> 
					<label for="textarea" class="col-md-4 col-form-label text-md-right">{{ __('Escreva a mensagem') }}</label>
					<input id="textarea" type="textarea" class="form-control @error('textarea') is-invalid @enderror" name="textarea" value="{{ old('textarea') }}" required autocomplete="textarea">
				</li>
				@error('textarea')
					<li class="form-row">
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					</li>
				@enderror
				
				<li class="form-row">
					<button type="submit" class="btn btn-primary">{{ __('Gravar') }}</button>
				</li>
				</ul>
			</form>
		</div>
	</div>
@endsection
