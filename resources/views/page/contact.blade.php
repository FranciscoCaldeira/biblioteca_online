@extends('layouts.app')

@section('content')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt2YQVoj9SP1SC_qpYFX9iZHSJi0FHiiQ&callback=initMap"
  type="text/javascript"></script>
  	@component('layouts.component.title')
        Contactos
    @endcomponent

    <h2>A nossa localização:</h2>
    <div id="map" style="height:500px;"></div>
    
    <script>
    // Initialize and add the map
    function initMap() {
    // The location of Uluru

    var uluru = {lat: 32.6592, lng: -16.9243};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 4, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
    }
	</script>
	
    <br>
	
	<div class="container_form">
		<div class="wrapper_form">
			
			<form method="POST" action="{{ route('submit_msg') }}">
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
					<button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
				</li>
				</ul>
			</form>
			

		</div>
	</div>
@endsection
