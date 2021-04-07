@extends('layout.app_login')

@section('content')

    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-in-form">
                <div class="sign-in-form-top">
                    <h1>Log in</h1>
                </div>
                <div class="signin">
                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login.custom') }}">
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
                                    value="Your Email" 
                                    onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Your Email';}" />
                                    {{-- <i class="fas fa-user-circle"></i> --}}

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
