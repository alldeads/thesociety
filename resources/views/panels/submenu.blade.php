{{-- For submenu --}}
<ul class="menu-content">
    @if(isset($menu))
        @foreach($menu as $submenu)
            <li class="{{ $submenu->slug === Route::currentRouteName() ? 'active' : '' }}">
                <a href="{{ isset($submenu->url) ? url($submenu->url):'javascript:void(0)' }}" class="d-flex align-items-center" target="{{isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'}}">
                    <i data-feather="circle"></i>
                    <span class="menu-item">{{ $submenu->name }}</span>
                </a>
                @if (isset($submenu->submenu))
                    @include('panels/submenu', ['menu' => $submenu->submenu])
                @endif
            </li>
        @endforeach
    @endif
</ul>
  