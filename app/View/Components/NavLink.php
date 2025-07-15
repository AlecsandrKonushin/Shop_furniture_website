<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{
    public string $href;
    public string $route;

    public function __construct(string $href, string $route)
    {
        $this->href = $href;
        $this->route = $route;
    }

    public function isActive(): bool
    {
        return request()->routeIs($this->route);
    }

    public function render(): View|Closure|string
    {
        return view('components.nav-link');
    }
}
