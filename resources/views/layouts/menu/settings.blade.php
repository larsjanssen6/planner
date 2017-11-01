<aside class="menu">
    <p class="menu-label">Algemeen</p>

    <ul class="menu-list">
        <li>
            <a href="{{ route('settings.profile', Auth::user()->id) }}" class="{{ isActiveRoute(['settings.profile']) }}">
                Profiel
            </a>
        </li>
    </ul>

    <p class="menu-label">Authenticatie</p>

    <ul class="menu-list">
        <li>
            <a href="{{ route('settings.role') }}" class="{{ isActiveRoute(['settings.role']) }}">
                Rollen
            </a>
        </li>

        <li>
            <a href="{{ route('settings.permission') }}" class="{{ isActiveRoute(['settings.permission']) }}">
                Permissies
            </a>
        </li>
    </ul>
</aside>