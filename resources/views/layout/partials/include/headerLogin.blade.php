<div class="header">

    <a class="logo" href="/">
        <img src="{{ asset('app-assets/logo/ushakikiLogo.png') }}" alt="" srcset="">
        <span class="cl1">S</span>
        <span class="cl2">HA</span>
        <span class="cl3">KI</span>
        <span class="cl4">KI</span>
    </a>

    <div class="header-right">
        <a class="MyAds" href="{{ route('ad.category') }}"><i class="far fa-edit"></i>Ajouter votre annonce</a>
        <div class="auth">
            <div id="app">
                <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->             
                    @if (Route::has('login.user'))
                        <a class="authBtn" href="{{ route('login.user') }}">Login&nbsp;&nbsp;<i
                                class="fas fa-user-circle"></i></a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <a class="authBtn" href="{{ route('register') }}">Register&nbsp;&nbsp;<i
                                class="fa fa-user-plus"></i></a>
                    @endif         
            </div>
        </div>
    </div>
</div>
</div>
