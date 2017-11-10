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

    @if(Auth::user()->can('edit-permission-settings') or Auth::user()->can('roles'))
        <ul class="menu-list">
            @can('roles')
                <li>
                    <a href="{{ route('settings.role') }}" class="{{ isActiveRoute(['settings.role']) }}">
                        Rollen
                    </a>
                </li>
            @endcan

            @can('edit-permission-settings')
                <li>
                    <a href="{{ route('settings.permission') }}" class="{{ isActiveRoute(['settings.permission']) }}">
                        Permissies
                    </a>
                </li>
            @endcan
        </ul>
    @endif
</aside>