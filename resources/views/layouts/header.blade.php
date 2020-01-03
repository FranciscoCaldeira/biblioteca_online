<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Biblioteca escolar online, livros, requisições">
<meta name="description" content="A Biblioteca escolar online é um projeto escolar para a cadeira de ACR, do mestrado 1º ciclo.">

<title>{{ config('app.name', 'Biblioteca Online') }}</title>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('js/my_js.min.js') }}" type="text/javascript"></script>

<!-- CDN colocar-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}?<?php echo time(); ?>" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}?<?php echo time(); ?>" >
