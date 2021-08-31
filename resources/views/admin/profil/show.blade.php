@extends('layout.default')
@section('content')
    <div class="card card-custom col-lg-10 mx-auto">
        <div class="card-header">
            <div class="card-title">
                <h2 class="mt-3">Edit </h2>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->has('success') }}
            </div>
        @endif
        <form action="{{ route('profil.update') }}" class="form" method="post">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="mb-2 row">
                    <div class="form-group col-lg-6" style="margin-bottom: 0;">
                        <label>* First Name:</label>
                        <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{ Auth::user()->firstName }}">
                        @error('firstName')
                            <div class="invalid-feedback">
                                {{ $errors->first('firstName') }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6" style="margin-bottom: 0;">
                        <label>* Last Name:</label>
                        <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror " value="{{ Auth::user()->lastName }}">
                        @error('lastName')
                            <div class="invalid-feedback">
                                {{ $errors->first('lastName') }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="row mb-2">
                    <div class="form-group col-lg-12" style="margin-bottom: 0;">
                        <label>* Username:</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror " value="{{ Auth::user()->username }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $errors->first('username') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="form-group col-lg-12" style="margin-bottom: 0;">

                        <label>* Email:</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " value="{{ Auth::user()->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="form-group col-lg-12" style="margin-bottom: 0;">

                        <label>* Phone:</label>
                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror " value="{{ Auth::user()->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="form-group col-lg-12" style="margin-bottom: 0;">
                        <label>* Organisation:</label>
                        <input type="text" name="organisation" class="form-control "
                            value="{{ Auth::user()->organisation }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="form-group col-lg-12" style="margin-bottom: 0;">
                        <label>* town:</label>
                        <input type="text" name="town" class="form-control " value="{{ Auth::user()->town }}">
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary font-weight-bold mr-2">Edit admin</button>
                        <a href="#" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
