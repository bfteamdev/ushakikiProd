@extends('layout.app_login')
@section('title') Login @endsection
@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="container d-flex justify-content-center align-items-center flex-column">
            <div class="headLogo">
                <h2>USHAKIKI</h2>
            </div>

            <div class="loginOrCreate">
                <span class="register {{ route('login.user') }}">Se connecter</span>
                <span class="register {{ route('register') }}">Ou <a href="/register">Creer un compte</a></span>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-10">

                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="signin">

                    <div class="signin-header">
                        {{-- <div class="header-title">Se connecter</div> --}}
                        <div class="header-img">
                            <img src="{{ asset('app-assets/images/avatar.svg') }}" alt="" srcset="">
                        </div>
                    </div>


                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="signin-body">
                            <div class="col-lg-12">
                                <div class="field">
                                    <label for="email" class="field-label">Adresse e-mail</label>
                                    {{-- <input type="text" class="field-input allInputs" name="" autocomplete="off" aria-autocomplete="off"> --}}
                                    <input type="text" class="field-input allInputs @error('email') is-invalid @enderror" id="email" name="email"/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="field">
                                    <label for="password" class="field-label">Mot de passe</label>
                                    <input type="password" class="field-input allInputs @error('password') is-invalid @enderror" id="password" name="password"/>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4 d-flex justify-content-between align-items-center">
                                <div class="col-lg-6">
                                    <button class="signin-btn" type="submit">Se connecter</button>
                                </div>
                                @if (Route::has('password.request'))
                                    <span class="passwordReset"><a href="{{ route('password.request') }}">Mot de
                                            passe oublie ?</a></span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.field-input').focus(function() {
                $(this).parent().addClass('is-focused has-label');
            });
            $('.field-input').blur(function() {
                if ($(this).val() == '') {
                    $(this).parent().removeClass('has-label');
                }
                $(this).parent().removeClass('is-focused');
            });
            $('.field-input').each(function() {
                if ($(this).val() != '') {
                    $(this).parent().addClass('has-label');
                }
            });

            $('.allInputs').keyup(function() {
                if ($(this).val() == "") {
                    $(this).parent().addClass('is-error-focused error');
                } else {
                    $(this).parent().removeClass('is-error-focused error');
                }
            });
        });

    </script>
@endsection
