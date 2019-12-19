<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    {{-- <div class="container">
        <div class="row">
            <div class="col-4 text-center">Teste1</div>
            <div class="col-4 text-center">Teste2</div>
            <div class="col-4 text-center">Teste3</div>
        </div>
        <div class="row">
            <div class="col-1 text-center">Sidebar</div>
            <div class="col-11 text-center">Content</div>
        </div>
    </div> --}}
    <div class="wrapper">

        {{-- Sidebar --}}
        <nav id="sidebar">
            <div class="sidebar-heading">

            </div>
        </nav>

        {{-- Page Content --}}
        <div id="content">

        </div>
    </div>
</body>

</html>
