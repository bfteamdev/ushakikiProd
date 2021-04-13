<div class="card-header card-header-tabs-line">
    <div class="card-title">
        <h3 class="card-label">Card Title With Icons</h3>
    </div>
    <div class="card-toolbar">
        <ul class="nav nav-tabs nav-bold nav-tabs-line">
            <li class="nav-item">
                <a class="nav-link @yield('activeImmobilier')" href="{{ route("ads.immobilier") }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    <span class="nav-text">Immobilier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('activeVoiture')" href="{{ route("ads.voiture") }}">
                    <span class="nav-icon"><i class="fas fa-car-side"></i></span>
                    <span class="nav-text">Voiture</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('activeTruc')" href="{{ route("ads.truc") }}">
                    <span class="nav-icon"><i class="flaticon2-gear"></i></span>
                    <span class="nav-text">Truc</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('activeService')" href="{{ route("ads.service") }}">
                    <span class="nav-icon"><i class="fas fa-handshake"></i></span>
                    <span class="nav-text">Service</span>
                </a>
            </li>
        </ul>
    </div>
</div>