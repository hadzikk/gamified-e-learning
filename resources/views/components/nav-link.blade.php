@props(['active' => false])

<a class="navbar-link {{ $active ? 'active' : '' }}" {{ $attributes }}>
    {{ $slot }}
</a>
