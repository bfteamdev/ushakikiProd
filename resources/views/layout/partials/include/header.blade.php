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
        

        <a class="MyAds" href="{{ route('ad.category') }}"><i class="fa fa-list-ul"></i> ajouter votre annonce</a>
        {{-- <a class="iconCart" href="login.html"><i class="fa fa-shopping-cart"></i></a> --}}

        <div class="auth">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
               
                        {{-- <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a> --}}
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        {{-- <li class="nav-item"> --}}
                                            <a class="authBtn" href="{{ route('login') }}">Login&nbsp;&nbsp;<i class="fas fa-user-circle"></i></a>

                                            {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="authBtn" href="{{ route('register') }}">Register&nbsp;&nbsp;<i class="fa fa-user-plus"></i></a>
                                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->username }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                   
                </nav>

               
            </div>

        </div>
        
     
    </div>
</div>
