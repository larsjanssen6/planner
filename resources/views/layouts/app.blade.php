<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                <a class="navbar-item" href="/">
                    <strong>PLANNER</strong>
                </a>

                <div class="navbar-burger burger" data-target="dealCloserNav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="dealCloserNav" class="navbar-menu">
                <div class="navbar-end">
                    @if(Auth::guest())
                        <a href="/" class="navbar-item">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp;
                            Login
                        </a>

                        <a href="/" class="navbar-item">
                            <i class="fa fa-info" aria-hidden="true"></i> &nbsp;
                            Info
                        </a>
                    @else
                        <a href="/" class="navbar-item">
                            Dashboard
                        </a>

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a href="#" class="navbar-link">
                                Overzicht
                            </a>

                            <div class="navbar-dropdown">
                                <a href="#" class="navbar-item">
                                    Opleidingen
                                </a>

                                <a href="/" class="navbar-item">
                                    Groepen
                                </a>

                                <a href="/" class="navbar-item">
                                    Peletons
                                </a>

                                <a href="/" class="navbar-item">
                                    Voertuigen
                                </a>

                                <hr class="navbar-divider">

                                <a href="/" class="navbar-item is-active">
                                    Gebruikers
                                </a>

                                <a href="/" class="navbar-item">
                                    Instellingen
                                </a>

                                <hr class="navbar-divider">

                                <div class="navbar-item">
                                    <div>Versie <p class="has-text-info">1.0</p></div>
                                </div>
                            </div>
                        </div>

                        <div class="navbar-item">
                            <div class="field">
                                <p class="control">
                                    <a href="{{ route('logout') }}" class="button is-primary">
                                                <span class="icon">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                </span>

                                        <span>Uitloggen</span>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <a href="/" class="navbar-item">
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
</body>
</html>
