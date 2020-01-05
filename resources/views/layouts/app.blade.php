<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>
    
    @include('layouts.navbar')
    
    @yield('content')
    
    <footer>
        @include('layouts.footer')
    </footer>

</body>
</html>
