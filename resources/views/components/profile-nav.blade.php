<nav class="nav nav-borders">
    <a class="nav-link ms-0 {{ request()->routeIs('profile.info') ? 'active' : '' }}" href="{{ route('profile.info') }}">Mes informations</a>
    <a class="nav-link {{ request()->routeIs('profile.security') ? 'active' : '' }}" href="{{ route('profile.security') }}">Securité</a>
</nav>
<hr class="mt-0 mb-4" />
