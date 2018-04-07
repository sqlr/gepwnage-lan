<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.components.head')

</head>
<body>

<div id="app">
    <nav class="navbar navbar-dark navbar-expand-md navbar-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('images/logo_100x69.png') }}"
                     alt="{{ config('app.name') }}"
                     style="height: 28px;"/>
            </a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li><a href="{{ route('home') }}" class="nav-link text-light">Home</a></li>
                    <li><a href="{{ route('home') }}" class="nav-link text-light">Sign up</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    @auth
                        <li class="nav-item dropdown">
                            <div role="button" id="navbarDropdown"
                                 class="nav-link text-light dropdown-toggle" style="cursor: pointer;"
                                 data-toggle="dropdown">
                                {{ auth()->user()->name }}
                                <span class="caret"></span>
                            </div>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{--<a class="dropdown-item" href="{{ route('home') }}">--}}
                                {{--My Ticket--}}
                                {{--</a>--}}
                                {{--<div class="dropdown-divider"></div>--}}
                                @if(auth()->user()->roles->contains('admin'))
                                    <a class="dropdown-item" href="{{ route('home') }}" target="_blank">
                                        Admin Panel
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form action="{{ route('logout') }}" method="POST"
                                      id="logout-form" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link text-light">Login</a></li>
                    @endauth

                    {{--@include('layouts.components.locale')--}}
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @include('layouts.components.alerts')
        </div>

        @yield('content')
    </main>

    <footer class="mt-5 py-5 bg-dark text-light">
        @include('layouts.components.footer')
    </footer>
</div>

</body>
</html>
