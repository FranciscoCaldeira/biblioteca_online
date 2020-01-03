@extends('layouts.default')

    @section('content')

    <div class="carousel-container">
        <div class="slide-img fade">
            <img src="{{ asset('img/1.png')}}" alt="biblioteca_escolar_imagem">
        </div>
        <div class="slide-img fade">
            <img src="{{ asset('img/2.png')}}" alt="biblioteca_escolar_imagem">
        </div>
        <div class="slide-img fade">
            <img src="{{ asset('img/3.png')}}" alt="biblioteca_escolar_imagem">
        </div>
    </div>

    @component('layouts.component.title')
        {{ __('text.Notícias / Destaques') }}
    @endcomponent

    <div>Agenda</div>
    <div>Sugestões de livros</div>
    <div>notícias//destaques//</div>
    <div>i am the home page</div>


    <script>
        $(document).ready(function() {
            var slideIndex = 0;
            showSlides();
            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("slide-img");
                
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }    

                slides[slideIndex-1].style.display = "block";  
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
        });
    </script>
@endsection