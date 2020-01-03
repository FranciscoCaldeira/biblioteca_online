<!-- Tab links -->
<div class="main-header">
  <div class="container_nav">
	<h1 class="bo-logo">
		<a href="{{ url('/') }}" class="btn-nav"><img src="{{ asset('img/logo.png')}}" width="170" height="95" alt="logo_biblioteca"> </a>
	</h1>
	<nav class="main-nav">
	  <ul class="main-nav-list">
			@if (Route::has('login'))
					@auth
					@if ($role == config('constants.roles.super_admin'))
						<li>
							<a href="{{ url('/users') }}" class="btn-nav"> {{ __('text.Utilizadores') }}</a>
						</li>
						<li>
							<a href="{{ url('/request') }}" class="btn-nav"> {{ __('text.Requisições') }}</a>
						</li>
					@elseif($role == config('constants.roles.admin'))
						<li>
							<a href="{{ url('/request') }}" class="btn-nav"> {{ __('text.Requisições') }}</a>
						</li>
					@endif
					<li>
						<a href="{{ url('/book') }}" class="btn-nav"> {{ __('text.Livros') }}</a>
					</li>
					<li>
						<a href="{{ url('/faq') }}" class="btn-nav">{{ __('text.FAQS') }}</a>
					</li>
					<li>
						<a href="{{ url('/contact') }}" class="btn-nav">{{ __('text.Contactos')}}</a>
					</li>
					<li>
						<a class="btn-nav" href="{{ url('/home') }}">{{ __('text.Perfil') }}</a>
					</li>
					<li>
						<a class="btn-nav" href="{{ url('/logout') }}">{{ __('text.Sair') }}</a>
					</li>
					@else
						<li>
							<a href="{{ url('/') }}" class="btn-nav">{{ __('text.Início') }}</a>
						</li>
						<li>
							<a href="{{ url('/about') }}" class="btn-nav">{{ __('text.Sobre') }}</a>
						</li>
						<li>
							<a href="{{ url('/faq') }}" class="btn-nav">{{ __('text.FAQS') }}</a>
						</li>
						<li>
							<a href="{{ url('/contact') }}" class="btn-nav">{{ __('text.Contactos')}}</a>
						</li>
						<li>
							<a class="btn-nav" href="{{ route('login') }}">{{ __('text.Login')}}</a>
						</li>
						@if (Route::has('register'))
							<li>
								<a class="btn-nav" href="{{ route('register') }}">{{ __('text.Registar')}}</a>
							</li>
						@endif
					@endauth
			@endif
	  </ul>
	</nav>
  </div>
</div>
