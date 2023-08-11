<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{-- Guest CSS --}}
    @vite('resources/assets/sass/guest/entrypoint.scss')
</head>

<body>

{{-- Main Container --}}
@yield('main')

{{-- Guest JS --}}
@vite('resources/assets/js/guest/entrypoint.js')

</body>

</html>