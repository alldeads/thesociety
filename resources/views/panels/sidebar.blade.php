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
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @foreach($__headers as $key => $header)
                <li class="navigation-header">
                    <span>{{ ucwords($key) }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                @foreach($header as $menu) 
                    <li class="nav-item {{  strrpos(Route::currentRouteName(), $menu->slug) !== false ? 'active' : '' }} {{ $menu->classList }}">
                        <a href="{{isset($menu->url)? url($menu->url):'javascript:void(0)'}}" class="d-flex align-items-center" target="{{$menu->newTab ? '_blank':'_self'}}">
                            <i data-feather="{{ $menu->icon }}"></i>
                            <span class="menu-title text-truncate">{{ $menu->name }}</span>
                            @if (isset($menu->badge))
                                <?php $badgeClasses = "badge badge-pill badge-light-primary ml-auto mr-1" ?>
                                    <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }} ">{{$menu->badge}}</span>
                            @endif
                        </a>
                        @if(isset($menu->submenu))
                            @include('panels/submenu', ['menu' => $menu->submenu])
                        @endif
                    </li>
                @endforeach
            @endforeach
        </ul>
    </div>
</div>