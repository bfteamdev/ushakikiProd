@extends('layout.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard Client') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                       
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <div class="container">
        <div class="my-5">
            <h2>Mon compte</h2>
        </div>
        <div class="col-md-3">
            <div class="widget">
                <ul class="categorie ">

                    <li><a class="list-group-item" href="">list ads</a></li>
                    <li><a class="list-group-item" href="">create ads</a></li>
                    <li><a class="list-group-item" href="">Profil</a></li>
                    <li><a class="list-group-item " href="">setting</a></li>

                </ul>
                {{-- <a class="list-group-item" href=""></a>
                    <a class="list-group-item" href="">Gestion des categories</a> --}}
            </div>


        </div>
    </div>

   
@endsection
