@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        {{ __('Todos os Pedidos') }}
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

    <table>
        <thead>
            <tr>
                <th>{{__('Nome')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Livro')}}</th>
                <th>{{__('Status')}}</th>
                <th>{{__('Pedido a')}}</th>
                <th>{{__('Ação')}}</th>

            </tr>
        </thead>
        <tbody>
            @foreach($requests as $row)
                <tr>
                    <td style="width: 100px;">{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td style="width: 300px;text-align:center;">
                        <p>
                            {{ __('Título') }}:  {{$row->title}}
                        </p>
                        <p>
                            {{ __('Autor') }}:   {{$row->author}}
                        </p>
                        <p>
                            {{ __('ISBN') }}:    {{$row->isbn}}
                        </p>
                    </td>
                    <td style="width: 100px;">{{$row->description}}</td>
                    <td style="width: 100px;">{{$row->created_at}}</td>
                    <td>
                    @if($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin'))
                        @if($row->request_state_id == config('constants.request_states.pendente'))
                            <p>
                                <form method="POST" action="request/accept/<?=$row->id?>">
                                    @csrf
                                    <button type="submit" class="btn card_btn">{{ __('Aceitar Levantamento') }} </button>
                                </form>
                            </p>
                            <p>
                                <form method="POST" action="request/reject/<?=$row->id?>">
                                    @csrf
                                    <button type="submit" class="btn card_btn">{{ __('Rejeitar Levantamento') }} </button>
                                </form>
                            </p>
                        @elseif($row->request_state_id == config('constants.request_states.entregue') )
                            <p>
                                <form method="POST" action="request/return/<?=$row->id?>">
                                    @csrf
                                    <button type="submit" class="btn card_btn">{{ __('Livro devolvido') }} </button>
                                </form>
                            </p>
                        @endif
                    @endif

                    @if($row->request_state_id == config('constants.request_states.pendente') && $row->user_id == $user_id)
                        <p>
                            <form method="POST" action="request/cancel/<?=$row->id?>">
                                @csrf
                                <button type="submit" class="btn card_btn">{{ __('Cancelar Pedido') }} </button>
                            </form>
                        </p>
                    @endif
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
@endsection