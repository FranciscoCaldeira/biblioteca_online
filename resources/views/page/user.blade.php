@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        {{ __('Todos os utilizadores') }}
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
                <th>Nome</th>
                <th>Email</th>
                <th>User</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user_role as $row)
            <tr>
                <td style="width: 100px;">{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td style="width: 300px;text-align:center;">{{$row->description}}</td>
                <td>
                    <p>
                        <form method="POST" action="{{ route('block_user') }}">
                            @csrf
                            <input type="hidden" value="{{$row->id}}" name="user_id">
                            <button type="submit" class="btn card_btn">{{ __('Bloquear utilizador') }} </button>
                        </form>
                    </p>
                    <p>
                        <form method="POST" action="{{ route('change_user_role') }}">
                        @csrf
                        <input type="hidden" value="{{$row->id}}" name="user_id">
                        {{'mudar para'}}
                            <select name="role_id">
                                @foreach($role_description as $row_role)
                                    <option value="{{$row_role->id}}">{{$row_role->description}}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="btn card_btn">{{ __('Guardar Role de utilizador') }} </button>
                        </form> 
                    </p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
@endsection
