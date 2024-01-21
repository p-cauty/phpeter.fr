<nav class="nav nav-borders">
    <a class="nav-link ms-0 {{ routeIs('admin.profile.info') ? 'active' : '' }}" href="{{ route('admin.profile.info') }}">Mes informations</a>
    <a class="nav-link {{ routeIs('admin.profile.security') ? 'active' : '' }}" href="{{ route('admin.profile.security') }}">Securité</a>
</nav>
<hr class="mt-0 mb-4" />
