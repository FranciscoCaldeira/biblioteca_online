@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        {{ __('Dashboard') }}
    @endcomponent

    @if (session('error'))
        <ul class="alert">           
            <li class="alert-danger">
                {{session('error')}}
            </li>
        </ul>
    @endif

    @if (session('success'))
        <ul class="alert">           
            <li class="alert-success">
                {{session('success')}}
            </li>
        </ul>
    @endif

    <div id="main">
        @if(isset($role))
            @if ($role == config('constants.roles.super_admin'))
                {{__('text.Seja bem-vindo')}} {{Auth::user()->name}} {{ __('text.Super Administrador')}} {{('pretende :')}}
                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/users') }}" class="btn"> {{ __('Mudar roles e bloquear utilizadores')}}</a></div>
                    <div></div>
                </div>
                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/book') }}" class="btn"> {{ __('Adicionar/editar/eliminar/requisitar livros')}}</a></div>
                    <div></div>
                </div>
                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/request') }}" class="btn"> {{ __('Aceitar/rejeitar/cancelar requisições')}}</a></div>
                    <div></div>
                </div>
                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/faq') }}" class="btn"> {{ __('Adicionar/editar/apagar Faqs')}}</a></div>
                    <div></div>
                </div>
            @elseif ($role == config('constants.roles.admin'))
                {{__('text.Seja bem-vindo')}} {{Auth::user()->name}} {{ __('text.Administrador')}}  {{('pretende :')}}<br>

                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/book') }}" class="btn"> {{ __('Adicionar/editar/eliminar/requisitar livros')}} </a>  </div>
                    <div></div>
                </div>

                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/request') }}" class="btn"> {{ __('Aceitar/rejeitar/cancelar requisições')}} </a>  </div>
                    <div></div>
                </div>

                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/faq') }}" class="btn"> {{ __('Adicionar/editar/apagar Faqs')}} </a>  </div>
                    <div></div>
                </div>

            @elseif ($role == config('constants.roles.user'))
                {{__('text.Seja bem-vindo')}} {{Auth::user()->name}} {{ __('text.Utilizador')}}  {{('pretende :')}}<br>

                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/request') }}" class="btn"> {{ __('Pedir/cancelar requisições')}} </a>  </div>
                    <div></div>
                </div>
            @else
                {{__('text.Seja bem-vindo')}} {{Auth::user()->name}} {{ __('text.Utilizador')}}  {{('pretende :')}}<br>

                <div class="wrapper">
                    <div></div>
                    <div> <a href="{{ url('/request') }}" class="btn"> {{ __('Pedir/cancelar requisições')}} </a>  </div>
                    <div></div>
                </div>
            @endif
        @endif
        
    </div>
@endsection
