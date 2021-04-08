@extends('layout.app')
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
                <span class="login">Se connecter</span>
                <span class="register">Ou <a href="/register">Creer un compte</a></span>
            </div>
            <div class="col-md-5 col-sm-10">
                <div class="signin">
                    <div class="signin-header">
                        {{-- <div class="header-title">Se connecter</div> --}}
                        <div class="header-img">
                            <img src="{{ asset('app-assets/images/avatar.svg') }}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="signin-body">
                        <div class="col-lg-12">
                            <div class="field">
                                <label for="nom" class="field-label">Adresse e-mail</label>
                                <input type="text" class="field-input allInputs" name="" autocomplete="off" aria-autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="field">
                                <label for="nom" class="field-label">Mot de passe</label>
                                <span class="passwordReset"><a href="">Mot de passe oublie ?</a></span>
                                <input type="password" class="field-input allInputs" name="" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-lg-5 mt-4">
                            <button class="signin-btn" type="submit">Se connecter</button>
                        </div>
                    </div>
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
