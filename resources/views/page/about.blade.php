@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        {{ __('Sobre') }}
    @endcomponent

    <div class="wrapper">
        <div>{{('Biblioteca online está utilizando a framework Laravel.')}}</div>
    </div>

    A biblioteca física disponibiliza dos seguintes serviços :
    <ul>
        <li>{{__('Consulta de presença (jornais, revistas, livros…)')}}</li>
        <li>{{('Serviço de empréstimo domiciliário')}}</li>
        <li>{{('Serviço de apoio à informação')}}</li>
        <li>{{('Acesso a pc’s de trabalho e acesso à Internet')}}</li>
        <li>{{('Visionamento de filmes e televisão por cabo')}}</li>
        <li>{{('Audição de música')}}</li>
        <li>{{('Serviço de fotocópias (documentos da BMCL) e impressões')}}</li>
        <li>{{('Acesso ao catálogo informatizado')}}</li>
        <li>{{('Atividades e dinamização cultural')}}</li>
        <li>{{('Ateliers')}}</li>
        <li>{{('Sessões de cinema')}}</li>
        <li>{{('Hora do estudo')}}</li>
        <li>{{('Hora do conto')}}</li>
        <li>{{('Troca de livros')}}</li>
        <li>{{('Encontros com escritores')}}</li>
        <li>{{('Outros')}}</li>
    </ul>
@endsection
