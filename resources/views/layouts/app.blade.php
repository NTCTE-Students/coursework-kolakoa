<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    li {
        list-style-type: none;
    }

    .custom-nav {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding-left: 0 !important;
    }

    .mr-15 {
        margin-right: 15px !important;
    }

    a {
        text-decoration: none;
    }

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: flex; flex-direction: row;">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto custom-nav" style="margin-right: 15px">
                        <li class="nav-item mr-15">
                            <a class="nav-link" href="{{ route('ads.index') }}">Объявления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ads.create') }}">Создать объявление</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto custom-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-15">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <p style="margin: 0" id="navbarDropdown" class="nav-link dropdown-toggle mr-15" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Пользователь: {{ Auth::user()->name }} <span class="caret"></span>
                            </p>

                            <div style= class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Выход
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
