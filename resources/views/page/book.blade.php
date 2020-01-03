@extends('layouts.app')

@section('content')
    @component('layouts.component.title')
        Livros
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

    @if (count($books) == 0)
        <p>{{ __('Sem nenhum livro para mostrar.') }}</p>
    @else
    <div id="books" class="main">
        <ul class="cards">
            @foreach ($books as $book)
                <li class="cards_item">
                <div id="<?=$book->id?>" class="card">
                    <div class="card_image">
                        @if(empty($book->filepath))
                            <img src="{{asset('img/book_default.jpg')}}">
                        @else
                            <img src="../img/{{$book->filepath}}">
                        @endif
                    </div>
                    <div class="card_content">
                        <h2 class="card_title">{{ __('Título') }}: {{$book->title}}</h2>
                        <h3 class="card_title">{{ __('Autor') }}: {{$book->author}}</h3>
                        <h3 class="card_title">{{ __('ISBN') }}: {{$book->isbn}}</h3>
                        <h3 class="card_title qntAvailable">{{ __('Disponível') }}: {{$book->qntAvailable}}</h3>
                        <p class="card_text">{{ __('Sinopse') }}: <br> {{$book->resume}}</p>
                            <div class="card_action">
                            @if($book->qntAvailable > 0)
                                <form method="POST" action="/request/add/<?=$book->id?>">
                                    @csrf
                                    <button type="submit" class="btn card_btn">{{ __('Requisitar') }} </button>
                                </form>
                            @endif

                            @if($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin'))
                            <button class="btn card_btn">{{ __('Editar') }}</button>

                            <form method="POST" action="{{ route('delete_book', <?=$book->id?>) }}">
                                @csrf
                                <button type="submit" class="btn card_btn">{{ __('Apagar') }} </button>
                            </form>
                            @endif
                            </div>
                    </div>
                </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin'))
        <div class="container_form">
            <div class="wrapper_form">
                <form method="POST" action="{{ route('add_book') }}" enctype="multipart/form-data">
                    @csrf
                    <ul>
                        <li class="form-row">    
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                        </li>
                        @error('title')
                            <li class="form-row">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </li>
                        @enderror

                        <li class="form-row"> 
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>
                            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required autocomplete="author">
                        </li>
                        @error('author')
                            <li class="form-row">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </li>
                        @enderror

                        <li class="form-row"> 
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>
                            <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}" required autocomplete="isbn">
                        </li>
                        @error('isbn')
                            <li class="form-row">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </li>
                        @enderror

                        <li class="form-row"> 
                            <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Sinopse') }}</label>
                            <input id="resume" type="text" class="form-control @error('resume') is-invalid @enderror" name="resume" value="{{ old('resume') }}" required autocomplete="resume">
                        </li>
                        @error('resume')
                            <li class="form-row">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </li>
                        @enderror

                        <li class="form-row"> 
                            <label for="qntAvailable" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade disponível') }}</label>
                            <input id="qntAvailable" type="number" class="form-control @error('qntAvailable') is-invalid @enderror" name="qntAvailable" value="{{ old('qntAvailable') }}" required autocomplete="qntAvailable" min="0">
                        </li>
                        @error('qntAvailable')
                            <li class="form-row">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </li>
                        @enderror

                        <li class="form-row"> 
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Imagem*') }}</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image">
                        </li>
                        <li class="form-row"> 
                            <h6>{{ __('*Limite 2mb') }}</h6>
                        </li>

                        <li class="form-row alert" style="display: none;">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ __('Ultrapassou o limite') }}</strong>
                            </span>
                        </li>

                        @error('image')
                            <li class="form-row">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </li>
                        @enderror

                        <li class="form-row">
                            <button type="submit" class="btn btn-primary">{{ __('Adicionar Livro') }}</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    @endif

    <script>
        $(document).ready(function() {
            $(".alert").hide();
            $("#image").on("change", function() {
                if($(this)[0].files[0].size > 2097152) {
                    $(this).val("");
                    $(".alert").show();
                } else {
                    $(".alert").hide();
                }
            });

        });
    </script>
@endsection
