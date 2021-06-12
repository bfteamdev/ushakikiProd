@extends('layout.app')
@section('changeActive') active @endsection
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
                <div class="d-flex flex-row my-5">
                    @include('website.dashbaord.sidebar')
                    <div class="flex-row-fluid col-lg-12">
                        <div class="card card-custom">
                            <div class="card-header py-3">
                                <h2 class=" text-center">Change Password</h2>
                            </div>
                            <form action="{{ route('dashboard.change.password.update') }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="">Old password</label>
                                            <input type="password" name="password"class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>                                                
                                            @enderror
                                        </div>                                       
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="">New password</label>
                                            <input type="password" name="new_password"class="form-control @error('new_password') is-invalid @enderror">
                                            @error('new_password')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('new_password') }}
                                            </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="">Confirm password </label>
                                            <input type="password" name="confirmation_password" class="form-control @error('confirmation_password') is-invalid @enderror">
                                            @error('confirmation_password')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('confirmation_password') }}
                                                </div>
                                            @enderror
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
<script src="{{ asset("js/pages/widgets.js") }}"></script>
 <script src="{{ asset("js/pages/custom/profile/profile.js") }}"></script>
@endsection