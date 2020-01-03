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
        @if ($role == config('constants.roles.super_admin'))
            {{ __('text.Super Administrador')}}
            
            <div class="wrapper">
                <div></div>
                <div> <a href="{{ url('/users') }}" class="btn"> {{ __('text.Mudar roles de utilizadores')}} </a> </div>
                <div></div>
                <div></div>
            </div>
            <div class="wrapper">
                <div></div>
                <div> <a href="{{ url('/book') }}" class="btn"> {{ __('text.Adicionar/editar/eliminar livros')}} </a>  </div>
                <div></div>
                <div></div>
            </div>
            <div class="wrapper">
                <div></div>
                <div> <a href="{{ url('/request') }}" class="btn"> {{ __('text.Aceitar/eliminar requisições')}} </a>  </div>
                <div></div>
                <div></div>
            </div>
        @elseif ($role == config('constants.roles.admin'))
            {{ __('text.Administrador')}}<br>

            {{ __('text.Adicionar/editar/eliminar livros')}}<br>

            {{ __('text.Adicionar/editar/eliminar requisições')}}<br>

        @elseif ($role == config('constants.roles.user'))
            {{ __('text.Utilizador')}}<br>

            {{ __('Adicionar requisições')}}<br>

            {{ __('Editar perfil')}}<br>
        @else
        {{ __('text.Utilizador')}}<br>

        {{ __('Adicionar requisições')}}<br>

        {{ __('Editar perfil')}}<br>
        @endif
    </div>
@endsection
