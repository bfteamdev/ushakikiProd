<div class="header">
    <div class="logo">
        <a href="/">
            <span class="cl1">US</span>
            <span class="cl2">HA</span>
            <span class="cl3">KI</span>
            <span class="cl4">KI</span>
        </a>
    </div>
    <div class="header-right">


        {{-- <a class="MyAds" href="login.html"><i class="fa fa-list-ul"></i> My Ads</a>
        <a class="iconCart" href="login.html"><i class="flaticon2-shopping-cart-1"></i></a> --}}


        <a class="MyAds" href="{{ route('ad.category') }}"><i class="far fa-edit"></i> Post a new Ad</a>
        {{-- <a class="iconCart" href="login.html"><i class="fa fa-shopping-cart"></i></a> --}}

        <div class="auth">

            <div id="app">
                <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
   
            @guest
                @if (Route::has('login'))
                    {{-- <li class="nav-item"> --}}
                    <a class="authBtn" href="{{ route('user.login') }}">Login&nbsp;&nbsp;<i class="fas fa-user-circle"></i></a>

                    {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}

                @endif

                @if (Route::has('register'))
                    <a class="authBtn" href="{{ route('register') }}">Register&nbsp;&nbsp;<i
                            class="fa fa-user-plus"></i></a>
                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}

                @endif
            @else
                <div class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="dropdown-item btn btn-danger" href="{{ route('home') }}">My dashboard</a>
                    </div>
                </div>
                @endguest
            </div>
        </div>

    </div>


</div>

