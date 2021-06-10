<ul class="nav nav-success nav-pills" id="myTab3" role="tablist">
    <li class="nav-item">
        <a class="nav-link @yield('edit')" href="{{ route('dashboard.ads.show', ['id' => $add->id]) }}">
            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
            <span class="nav-text">Edit Ad</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @yield('renew')" href="{{ route('dashboard.ad.renew',['id'=>$add->id]) }}">
            <span class="nav-icon"><i class="flaticon2-gear"></i></span>
            <span class="nav-text">Renouvelle votre annonce</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link @yield('reset')" href="{{ route('clients.reset', ['client' => $client->id]) }}">
            <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
            <span class="nav-text">Reset password</span>
        </a>
    </li> --}}
  </ul>