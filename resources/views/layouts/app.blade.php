<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Planner')}}</title>

    <link rel="stylesheet" href="{{asset('css/bulma.css')}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link href="{{ mix('/css/packages.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="bar"></div>
        <nav class="navbar">
            <div class="navbar-brand">
                <a class="navbar-item is-active" href="/">
                    <strong>PLANNER</strong>
                </a>

                <div class="navbar-burger burger" data-target="plannerNav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="plannerNav" class="navbar-menu">
                <div class="navbar-end">
                    @if(Auth::guest())
                        <a href="/" class="navbar-item  {{ isActiveRoute(['login']) }}">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp;
                            Login
                        </a>

                        <a href="/info" class="navbar-item  {{ isActiveRoute(['info.index']) }}">
                            <i class="fa fa-info" aria-hidden="true"></i> &nbsp;
                            Info
                        </a>
                    @else
                        <a href="/" class="navbar-item {{ isActiveRoute(['dashboard']) }}">
                            Dashboard
                        </a>

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a href="#" class="navbar-link
                            {{ isActiveRoute(['education.index', 'group.index', 'peleton.index', 'vehicle.index', 'user.index', 'settings.profile', 'settings.permission']) }}">
                                Overzicht
                            </a>

                            <div class="navbar-dropdown">
                                <a href="/opleidingen" class="navbar-item {{ isActiveRoute(['education.index']) }}">
                                    Opleidingen
                                </a>

                                <a href="/groepen" class="navbar-item {{ isActiveRoute(['group.index']) }}">
                                    Groepen
                                </a>

                                <a href="/peletons" class="navbar-item {{ isActiveRoute(['peleton.index']) }}">
                                    Peletons
                                </a>

                                <a href="/voertuigen" class="navbar-item {{ isActiveRoute(['vehicle.index']) }}">
                                    Voertuigen
                                </a>

                                <hr class="navbar-divider">

                                <a href="/gebruikers" class="navbar-item {{ isActiveRoute(['user.index']) }}">
                                    Gebruikers
                                </a>

                                <a href="{{ route('settings.profile', Auth::user()->id) }}" class="navbar-item {{ isActiveRoute(['settings.profile', 'settings.permission']) }}">
                                    Instellingen
                                </a>

                                <hr class="navbar-divider">

                                <div class="navbar-item">
                                    <div>Versie <p class="has-text-info">1.0</p></div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('logout') }}" class="navbar-item is-active">
                            <span class="icon">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </span>
                            <span>Uitloggen</span>
                        </a>

                        <a href="{{ route('settings.profile', Auth::user()->id) }}" class="navbar-item is-active">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </a>
                    @endif
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <p>
                        <strong>Planner</strong>
                        <small> {{ date("Y") }}</small>
                    </p>
                </div>
            </div>
        </footer>
    </div>

    @if(Session::has('status'))
        <div id="is-popUp" class="notification is-popUp slideUp {!! Session::has('class') ? session('class') : '' !!}">
            <p>
                {!! session('status')  !!}
            </p>
        </div>
    @endif

    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/custom.js') }}"></script>
</body>
</html>
