<footer>
    <div class="footer">
        <div class="wrapper">
            <div>
                <a href="{{ url('/') }}" class="btn-foot"> {{ __('text.Biblioteca online') }}</a>
            </div>
            <div>
                <a href="{{ url('/about') }}" class="btn-foot">{{ __('text.Sobre') }}</a>
            </div>
            <div>
                <a href="{{ url('/contact') }}" class="btn-nav">{{ __('text.Contactos')}}</a>
            </div>
        </div>
        <div class="wrapper">
            <div>
                <a href="{{ url('/faq') }}" class="btn-foot">{{ __('text.FAQS') }}</a>
            </div>
            <div class="btn-foot">
                {{ __('text.Idiomas') }}
            </div>
            <div>
                {{ __('text.Siga-nos') }}
            </div>
        </div>
        <div class="wrapper">
            <div></div>
            <div class="flag">
                <a href="/pt"><img src="{{ asset('img/pt-PT.gif') }}" alt="pt-Pt"></a>
                <a href="/en"><img src="{{ asset('img/en-US.gif') }}" alt="en-En"></a>
            </div>
            <div>
                <div class="sfllow">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-google"></a>
                    <a href="#" class="fa fa-youtube"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div><p>{{ __('text.© Biblioteca Online 2019 - All rights reserved - Francisco & Paulo') }}</p></div>
        </div>
    </div>
</footer>