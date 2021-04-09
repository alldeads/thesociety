@if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"]))
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <span class="brand-logo">
                            @include('panels.logo')
                        </span>
                        <h2 class="brand-text mb-0">The Section 32</h2>
                    </a>
                </li>
            </ul>
        </div>
@else
    <nav class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
@endif
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="javascript:void(0);">
                            <i class="ficon" data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-style">
                            <i class="ficon" data-feather="{{($configData['theme'] === 'dark') ? 'sun' : 'moon' }}"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ auth()->user()->profile->name }}</span>
                            <span class="user-status">Admin</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="mr-50" data-feather="user"></i> Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <i class="mr-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<!-- END: Header-->
