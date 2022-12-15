@php
    $configData = Helper::applClasses();
@endphp

<div class="main-menu menu-fixed {{(($configData['theme'] === 'dark') || ($configData['theme'] === 'semi-dark')) ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ $__avatar }}" width="50">
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="shadow-bottom"></div>

    <div class="main-menu-content mt-2">
        <ul class="navigation navigation-main pb-5" id="main-menu-navigation" data-menu="menu-navigation">
            @foreach($__menus as $menu)
                <li class="nav-item {{ strrpos(Route::currentRouteName(), $menu->slug) !== false ? 'active' : '' }} {{ $menu->classList }} {{ $menu->submenus()->count() > 0 ? 'has-sub' : '' }}">
                    <a href="{{ isset($menu->url) ? url($menu->url):'javascript:void(0)' }}" class="d-flex align-items-center" target="{{$menu->newTab ? '_blank':'_self'}}">
                        <i data-feather="{{ $menu->icon }}"></i>
                        <span class="menu-title text-truncate">{{ $menu->name }}</span>
                    </a>

                    @if($menu->submenus()->count() > 0)
                        @include('panels/submenu', ['menu' => $menu->submenus])
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
