<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Census') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css', config('app.https')) }}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js', config('app.https')) }}"></script>
</body>
</html>
