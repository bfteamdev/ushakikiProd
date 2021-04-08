@extends('layout.app_login')
@section('title')
    <title>Login</title>
@endsection
@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="container d-flex justify-content-center align-items-center flex-column">
            <div class="headLogo">
                <h2>USHAKIKI</h2>
            </div>
           
            <div class="loginOrCreate">
                <span class="{{ route('login.user') }}">Se connecter</span>
                <span class="{{ route('register') }}">Ou <a href="/register">Creer un compte</a></span>
            </div>
            <div class="col-md-5 col-sm-10">
                <div class="signin">
                    @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
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
                                <label for="nom" class="field-label">Adresse e-mail</label>
                                {{-- <input type="text" class="field-input allInputs" name="" autocomplete="off" aria-autocomplete="off"> --}}
                                <input type="text" class="field-input allInputs @error('email') is-invalid @enderror" name="email"
                                value="Your Email" 
                                onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Your Email';}"
                                autocomplete="off" aria-autocomplete="off" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="field">
                                <label for="nom" class="field-label">Mot de passe</label>
                                {{-- <input type="password" class="field-input allInputs" name="" autocomplete="off"> --}}
                                <input type="password" class="field-input allInputs @error('password') is-invalid @enderror"
                                name="password" value="password" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Email address:';}"
                                autocomplete="off" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4 d-flex justify-content-between">
                            <div class="col-lg-6">
                                <button class="signin-btn" type="submit">Se connecter</button>
                            </div>
                            <div class="col-lg-6">
                                <span class="passwordReset mt-2"><a href="" class="">Mot de passe oublie ?</a></span>
                            </div>
                            {{-- <input type="submit" value="Log in"> --}}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
