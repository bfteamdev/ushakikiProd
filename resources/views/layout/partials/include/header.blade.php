<div class="header">
    <a class="logo" href="/">
        <img src="{{ asset('app-assets/logo/ushakikiLogo.png') }}" alt="" srcset="">
        <span class="cl1">S</span>
        <span class="cl2">HA</span>
        <span class="cl3">KI</span>
        <span class="cl4">KI</span>
    </a>
    <div class="header-right">
        <a class="MyAds" href="{{ route('ad.category') }}"><i class="far fa-edit"></i>Ajouter votre
            annonce</a>
        <div class="auth">
                @guest
                    @if (Route::has('login.user'))
                        <a class="authBtn" href="{{ route('login.user') }}">Login&nbsp;&nbsp;<i
                                class="fas fa-user-circle"></i></a>
                    @endif
                    @if (Route::has('register'))
                        <a class="authBtn" href="{{ route('register') }}">Register&nbsp;&nbsp;<i
                                class="fa fa-user-plus"></i></a>
                    @endif
                @else
                    <div class="profilHeader">
                        <div class="profilImg">
                            <img src="{{ asset('storage/' . Auth::user()->profil) }}" alt="" srcset="">
                        </div>
                        <div class="usernameProfil">
                            <span class="name">{{ Auth::user()->email }}</span>
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <div class="submenu">
                            <ul>
                                <li><a href="{{ route('home') }}"><i class="fas fa-chart-line"></i> Dashboard</a></li>
                                <li><a href="{{ route('dashboard.message') }}"><i class="far fa-comments"></i> Message</a>
                                </li>
                                <li><a href="{{ route('dashboard.profil') }}"><i class="fas fa-user"></i> Profil</a>
                                </li>
                                <li><a href="{{ route('dashboard.ads') }}"><i class="fas fa-home"></i>Mes annonce</a>
                                </li>
                                <li><a href="{{ route('logout.user') }}"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                @endguest
        </div>
        <button id="showCart" class="iconCart flaticon2-shopping-cart-1"></button>
    </div>
    <span id="responsiveBtn" class="fas fa-list-alt"></span>
</div>
