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

<div id="news" class="wrapper">
    <div style="border:1px solid black;padding: 20px;">
        <h2>Os maiores 'tesouros' da biblioteca de imagens da NASA</h2>
        <hr>
           09:49 20/10/2019
        <hr>
        As décadas de missões de espaciais no portefólio da NASA permitiram à agência espacial recolher uma série de autênticos ‘tesouros’ sob formas de fotografias. Além de nos permitirem saber mais sobre o Universo que nos rodeia, estas imagens cumprem também a missão de nos inspirar a atingir outras alturas e, verdade se diga, são bem sucedidas nessa missão.
    </div>
    <div style="border:1px solid black;padding: 20px;">
        <h2>Biblioteca online tem mais de três mil livros gratuitos em português</h2>
        <hr>
            10:25 - 26/06/16
        <hr>
        Uma biblioteca online disponibiliza gratuitamente mais de 3.000 livros em português europeu, além de ter 25 reedições de títulos que estavam desaparecidos e um espaço de edição de originais de novos autores.
    </div>
    <div style="border:1px solid black;padding: 20px;">
        <h2>Biblioteca-Museu República e Resistência encerra hoje para obras</h2>
        <hr>
            08:17 - 14/11/19 
        <hr>
        A Biblioteca-Museu República e Resistência, em Lisboa, encerra hoje para obras de remodelação e, de acordo com a Câmara de Lisboa, "a coleção" estará novamente disponível ao público na rede de bibliotecas de Lisboa, a partir de janeiro.
    </div>
    <div style="border:1px solid black;padding: 20px;">
        <h2>Mulher devolve livro em atraso a biblioteca... 74 anos depois</h2>
        <hr>
            17:15 - 23/10/19 
        <hr>
        Uma mulher do estado norte-americano da California estava a limpar o seu escritório quando encontrou um livro da biblioteca que a mãe tinha pedido emprestado... 74 anos antes. Então decidiu devolvê-lo. 
    </div>
</div>
<br>
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