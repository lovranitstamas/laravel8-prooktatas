<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('frontend.layout.head')

<body>
@include('frontend.layout.menu')
@yield('content')

@yield('footer')
</body>
</html>
