<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gamebrary') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">

        <link rel="stylesheet" href="{{ asset('css/details.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="{{ asset('css/config.css') }}">
        <link rel="stylesheet" href="{{ asset('css/products.css') }}">
        <link rel="stylesheet" href="{{ asset('css/games.css') }}">


    </head>
    <body>
        <div id="banner">
            <img id="drake" src="{{ asset('images/Logo_dragon_gamebrary3.PNG') }}"></img>
        </div>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-laravel ">


                <a class="navbar-brand space" href="{{ url('/') }}" >
                    INICIO
                </a>
                <a class="navbar-brand space " href="{{ url('/juegos') }}">
                    JUEGOS
                </a>
                <a class="navbar-brand space " href="{{ url('/libros') }}">
                    LIBROS
                </a>
                <?php
                $user = \Auth::user();
                ?>
                @if ($user)
                <a class="navbar-brand space" href="{{ url('/donaciones') }}">
                    COLABORA
                </a>

                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>

                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nick }}
                                <!-- <span class="caret"></span> -->
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    Perfil
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                    @csrf
                                </form>
                                <?php
                                $user = \Auth::user();
                                $role = $user->role;
                                ?>
                                @if ($role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.board') }}">
                                    Panel de control
                                </a>
                                @endif
                            </div>
                        </li>
                        <li>
                            @include('includes.avatar')
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

    </body>

</html>
