<div class="header">
    <div class="header-left">
        <a href="/" class="logo">
            <img src="{{ asset('img/logo.png') }}" width="40" height="40" alt="">
        </a>
    </div>
    <div class="page-title-box pull-left">
        <h3>theGround</h3>
    </div>
    @auth
        <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars"
                                                                           aria-hidden="true"></i></a>
    @endauth
    <ul class="nav navbar-nav navbar-right user-menu pull-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle user-link" data-toggle="dropdown">
                <img style="padding-bottom: 3px;"
                     src="{{ asset((\Illuminate\Support\Facades\App::isLocale('ar')) ? 'img/flags/ar.png':'img/flags/fr.png') }}"
                     width="20"
                     alt="">
                <span
                    style="padding-left: 8px;">{{(\Illuminate\Support\Facades\App::isLocale('ar')) ? 'AR':'FR'}}</span>
                <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                @if((\Illuminate\Support\Facades\App::isLocale('ar')))
                    <li><a href="#">FR</a></li>
                @else
                    <li><a href="#">AR</a></li>
                @endif
            </ul>
        </li>
        @auth
            <li class="dropdown">
                <a href="#" class="dropdown-toggle user-link" data-toggle="dropdown" title="{{ $myInfo->name }}">
                    <span class="user-img">
                        <img class="img-circle" src="{{ asset('img/user.jpg') }}" width="40"
                             alt="{{ $myInfo->name }}">
                        <span class="status online"></span>
                    </span>
                    <span>{{ $myInfo->name }}</span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu">
                    @if(isset($company))
                        <li><a href="{{ route('profile', compact('company', 'myInfo')) }}">My Profile</a></li>
                        <li><a href="{{ route('params', compact('company', 'myInfo')) }}">params</a></li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            @else
                <li><a href="{{ route('login') }}">login</a></li>
                <li><a href="{{ route('register') }}">register</a></li>
                @endauth
    </ul>
    <div class="dropdown mobile-user-menu pull-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <ul class="dropdown-menu pull-right">
            @auth
                @if(isset($company))
                    <li><a href="#">{{ $company->name }}</a></li>
                @endif
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                    <li><a href="{{ route('login') }}">login</a></li>
                    <li><a href="{{ route('register') }}">register</a></li>
                    @endauth
        </ul>
    </div>
</div>
