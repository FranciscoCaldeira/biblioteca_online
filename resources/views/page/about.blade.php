@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        {{ __('Sobre') }}
    @endcomponent

    <div class="wrapper">
        <div>Biblioteca utilizando a framework Laravel</div>
    </div>
@endsection
