@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        {{ __('FAQS') }}
    @endcomponent

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

    @if(count($faqs) == 0)
    <div class="wrapper">
        <div></div>
        <div>
            <p>{{_('Não existem faqs de momento')}}.</p>
            <p>{{_('Precisa de ajuda, envie-nos um email')}} <a href="/contact">{{ __('aqui') }}</a>.</p>
        </div>
        <div></div>
    </div>
    @else
        @foreach ($faqs as $key => $faq)
        <div class="parent-container">
            <ul id="<?=$faq->id?>" class="faq">
                <li>
                    <h3 class="question">{{$faq->question}}?<div class="plus-minus-toggle collapsed"></div></h3>
                    <div class="answer">{{$faq->answer}}</div>
                    @if (Route::has('login'))
                    @auth
                    @if ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin'))
                            <div class="wrapper">
                                <div><button type="submit" value="<?=$faq->id?>" class="btn card_btn edit">{{ __('Editar') }} </button></div>
                                <div>
                                    <form method="POST" action="faq/delete/<?=$faq->id?>">
                                        @csrf
                                        <button type="submit" class="btn card_btn">{{ __('Apagar') }} </button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        @endauth
                    @endif
                </li>
            </ul>
        </div> 
        @endforeach
        <p>{{__('Precisa ainda de ajuda, envie-nos um email')}} <a href="/contact">{{ __('aqui') }}</a>.</p>
    @endif
            
    @if (Route::has('login'))
		@auth
        @if ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin'))
            <div class="container_form">
                <div class="wrapper_form">
                <form id="form" method="POST" action="{{ route('post_faq') }}">
                    @csrf
                    <ul>
                    <li class="form-row">    
                        <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Questão') }}</label>
                        <input id="question" type="textarea" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus>
                    </li>
                    @error('question')
                        <li class="form-row">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </li>
                    @enderror
                    <li class="form-row"> 
                        <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Resposta') }}</label>
                        <input id="answer" type="textarea" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required autocomplete="resposta">
                    </li>
                    @error('resposta')
                        <li class="form-row">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </li>
                    @enderror
                    <li class="form-row">
                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                    </li>
                    </ul>
                </form>
                </div>
            </div>
        @endif
        @endauth
    @endif

    <script>
        $(document).ready(function() {
            $('.edit').click(function() {
                var faq_id = $(this).attr("value");
                $("#answer").val($("#"+faq_id+" .answer")[0].innerText);
                $("#question").val($("#"+faq_id+" .question")[0].innerText);
                $("#form").attr('action', '/faq/update/'+faq_id);
        });
    });
    </script>
@endsection
