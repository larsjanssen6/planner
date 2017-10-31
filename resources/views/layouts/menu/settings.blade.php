<aside class="menu">
    <p class="menu-label">Algemeen</p>

    <ul class="menu-list">
        <li>
            <a href="{{ route('settings.profile', Auth::user()->id) }}" class="{{ setActive('instellingen/profiel/' . Auth::user()->id) }}">
                Profiel
            </a>
        </li>
    </ul>

    <p class="menu-label">Authenticatie</p>

    <ul class="menu-list">
        <li>
            <a href="{{ route('settings.roles') }}" class="{{ setActive('instellingen/rollen') }}">
                Rollen
            </a>
        </li>

        <li>
            <a href="{{ route('settings.permission') }}" class="{{ setActive('instellingen/permissies') }}">
                Permissies
            </a>
        </li>
    </ul>
</aside>