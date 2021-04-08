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


        <a class="MyAds" href="{{ route('ad.category') }}"><i class="fa fa-list-ul"></i> ajouter votre annonce</a>
        {{-- <a class="iconCart" href="login.html"><i class="fa fa-shopping-cart"></i></a> --}}

        <div class="auth">
            <div id="app">
                <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
             
                    @if (Route::has('login'))
                        {{-- <li class="nav-item"> --}}
                        <a class="authBtn" href="{{ route('login.user') }}">Login&nbsp;&nbsp;<i
                                class="fas fa-user-circle"></i></a>

                        {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                        </li>
                    @endif

                    @if (Route::has('register'))

                        <a class="authBtn" href="{{ route('register') }}">Register&nbsp;&nbsp;<i
                                class="fa fa-user-plus"></i></a>
                        {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}

                    @endif
           
            </div>
        </div>

    </div>


</div>
</div>
