@props(['href', 'route'])

<li class="nav-item">
    <a {{ $attributes->merge([
        'href' => $href,
        'class' => 'nav-link' . (request()->routeIs($route) ? ' active' : '')
    ]) }}>
        {{ $slot }}
    </a>
</li>
