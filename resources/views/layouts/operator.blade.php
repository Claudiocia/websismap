<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WebSisMap') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ Html::image('/image/marca.jpg', 'marca', ['height' => '50']) }}
                    {{ config('app.name', 'WebSisMap') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                            @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cadastros<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="#">Empresa</a>
                                <a class="nav-link" href="#">Prédios</a>
                                <a class="nav-link" href="#">Setores</a>
                                <a class="nav-link" href="#">Materiais</a>
                                <a class="nav-link" href="#">Unidades</a>

                            </div>
                        </li>
                    </ul>
                        @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('ordens.logincli') }}">Cliente</a></li>
                            <li><a class="nav-link" href="{{ route('operator.loginoper') }}">Operador</a></li>
                            <li><a class="nav-link" href="{{ route('admin.login') }}">Admin</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="#">Inicio</a>
                                    <a class="dropdown-item" href="#">Lista de Usuários</a>
                                    <a class="dropdown-item" href="#">Novo Usuário</a>

                                    <a class="dropdown-item" href="{{ route('operator.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('operator.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::has('message'))
            <div class="container">
                {!! Alert::success(Session::get('message'))->close() !!}
            </div>
        @endif


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
