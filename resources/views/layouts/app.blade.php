<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <main class="">

            @auth
                <div class="">
                    <div class="d-flex">
                        <div class="  sidebar p-0" >
                            @include('layouts.sidebar')
                        </div>
                        <div class="p-0 w-100 ">
                           @include('layouts.navbar')
                            @yield('content')
                        </div>
                    </div>
                </div>
            @endauth


        @guest
              @include('layouts.navbar')
            @yield('content')
            @endguest
        </main>
    </div>
</body>
</html>
