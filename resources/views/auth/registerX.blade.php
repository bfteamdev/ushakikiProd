@extends('layout.app')

@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-up">
                <h1>Create an account</h1>
                {{-- <p class="creating">Having hands on experience in creating innovative designs,I do offer design
                    solutions which harness.</p> --}}
                <h2>Personal Information</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="sign-u">

                        <div class="sign-up1">
                            <h4> username* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" placeholder=" " required=" " />

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Email Address* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input type="email" class="form-control email @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Password* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Confirm Password* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input type="password" class="form-control" name="password_confirmation" required
                                autocomplete="new-password" />

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sub_home">
                        <div class="sub_home_left">
                            {{-- <button type="submit" class="btn btn-primary">
                                Create
                            </button> --}}
                            <input type="submit" value="Create">

                        </div>

                        <div class="sub_home_right">
                            <p>Go Back to <a href="{{ route('site.index') }}">Home</a></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<style>
    .email {
        margin-top: 16px;
    }

</style>
