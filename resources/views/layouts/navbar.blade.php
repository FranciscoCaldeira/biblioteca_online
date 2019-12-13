<!-- Tab links -->
<div class="main-header">
  <div class="container_nav">
	<h1 class="bo-logo">
		<a href="{{ url('/') }}" class="btn-nav"><img src="{{ asset('img/logo.png')}}" width="170" height="95" alt="logo_biblioteca"> </a>
	</h1>
	<nav class="main-nav">
	  <ul class="main-nav-list">
		<li>
		  <a href="{{ url('/') }}" class="btn-nav"> Início</a>
		</li>
		<li>
		  <a href="{{ url('/about') }}" class="btn-nav"> Sobre</a>
		</li>
		<li>
		  <a href="{{ url('/contact') }}" class="btn-nav"> Contactos</a>
		</li>
		<li>
		  <a href="{{ url('/faqs') }}" class="btn-nav"> FAQS</a>
		</li>
			@if (Route::has('login'))
					@auth
					<li>
						<a class="btn-nav" href="{{ url('/home') }}">HomeLaravel-LOgadoTEu homepage</a>
					</li>
					@else
						<li>
							<a class="btn-nav" href="{{ route('login') }}">Login</a>
						</li>
						@if (Route::has('register'))
						<li>
							<a class="btn-nav" href="{{ route('register') }}">Register</a>
						</li>
						@endif
					@endauth
			@endif
	  </ul>
	</nav>
  </div>
</div>
