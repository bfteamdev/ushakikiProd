@extends('layout.app')
@section('profilActive') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
@endsection
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                        id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>

                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid ">
            <!--begin::Container-->
            <div class="container">
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->has('error') }}
                    </div>
                @endif
                {{-- @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->has('success') }}
                    </div>
                @endif --}}
                <div class="d-flex flex-row my-5">
                    @include('website.dashbaord.sidebar')
                    <div class="flex-row-fluid col-lg-12">
                        <div class="card card-custom">
                            <div class="card-header py-3">
                                <h2 class=" text-center">Mon profil</h2>
                            </div>
                            <form action="{{ route('dashboard.profil.update') }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="">firstName</label>
                                            <input type="text" name="firstName" value="{{ Auth::user()->firstName }}"
                                                class="form-control @error('firstName') is-invalid @enderror">
                                                @error('firstName')
                                                    <div class="invalid-feedback">
                                                      {{ $errors->first('firstName') }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">LastName</label>
                                            <input type="text" name="lastName" value="{{ Auth::user()->lastName }}"
                                                class="form-control @error('lastName') is-invalid @enderror">
                                                @error('lastName')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('lastName') }}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="">username </label>
                                            <input type="text" name="username" value="{{ Auth::user()->username }}"
                                                class="form-control @error('username') is-invalid @enderror">
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('username') }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">email </label>
                                            <input type="text" name="email" value="{{ Auth::user()->email }}"
                                                class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="">Phone</label>
                                            <input type="number" name="phone" value="{{ Auth::user()->phone }}"
                                                class="form-control @error('phone') is-invalid @enderror" min="1">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('phone') }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">organisation</label>
                                            <input type="text" name="organisation"
                                                value="{{ Auth::user()->organisation }}" class="form-control">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="">town</label>
                                            <input type="text" name="town" value="{{ Auth::user()->town }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-light-dark font-weight-bold mr-2">Back</a>
                                    <button type="submit" class="btn btn-light-primary font-weight-bold mr-2">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/pages/widgets.js') }}"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
@endsection
