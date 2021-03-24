@extends('layout.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-in-form">
                <div class="sign-in-form-top">
                    <h1>Log in</h1>
                </div>
                <div class="signin">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="signin-rit">
                            <span class="checkbox1">
                                <label class="checkbox"><input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>Forgot Password
                                    ?</label>
                            </span>
                            <p>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Click Here
                                    </a>
                                @endif
                            </p>
                            <div class="clearfix"> </div>
                        </div>

                        <div class="log-input">
                            <div class="log-input-left">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="Your Email" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Your Email';}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span class="checkbox2">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
                            </span>
                            <div class="clearfix">

                            </div>
                            <div class="log-input">
                                <div class="log-input-left">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" value="password" onfocus="this.value = '';"
                                        onblur="if (this.value == '') {this.value = 'Email address:';}" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <span class="checkbox2">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i>
                                        </i></label>
                                </span>
                                <div class="clearfix">
                                </div>
                            </div>
                            <input type="submit" value="Log in">

                    </form>
                </div>
                <div class="new_people">
                    <h2>For New People</h2>
                    <p>Having hands on experience in creating innovative designs,I do offer design
                        solutions which harness.</p>
                    <a href="{{ route('register') }}">Register Now!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
