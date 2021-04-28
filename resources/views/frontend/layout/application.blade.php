<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('frontend.layout.head')

<body>
@include('frontend.layout.menu')
<div class="container py-5">
    @yield('content')
</div>

<div class="p-2">
    @yield('footer')
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>

</body>
</html>
