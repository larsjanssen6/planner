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