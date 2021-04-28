<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('frontend.layout.head')

<body>
@include('frontend.layout.menu')
<div class="container py-5">
    @yield('content')
</div>

@yield('footer')

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
