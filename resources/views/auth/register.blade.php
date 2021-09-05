@extends('layout.app')
@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="container d-flex justify-content-center align-items-center flex-column">
            <div class="headLogo">
                <h2>USHAKIKI</h2>
            </div>
            <div class="loginOrCreate">
                <span class="register">Creer un compte</span>
                <span class="register">Ou <a href="{{ route('login.user') }}">Se connecter</a></span>
            </div>
            <div class="col-md-6 col-sm-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="signin">
                        <div class="signin-body">
                            <div class="col-lg-12">
                                <div class="field">
                                    <label for="username" class="field-label">Username</label>
                                    <input type="text" class="field-input allInputs @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" id="username" />

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="field">
                                    <label for="email" class="field-label">Adresse e-mail</label>
                                    <input type="email" class="field-input allInputs @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" id="email" />
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
                                    <input type="password"
                                        class="field-input allInputs @error('password') is-invalid @enderror"
                                        name="password" required id="password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="field">
                                    <label for="password_confirmation" class="field-label">Mot de passe de
                                        comfirmation</label>
                                    <input type="password" class="field-input allInputs" name="password_confirmation"
                                        required id="password_confirmation" />
                                </div>
                            </div>
                            <div class="col-lg-5 mt-4">
                                <button class="signin-btn" type="submit">S'iscrire</button>
                            </div>
                        </div>
                    </div>
                </form>
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
