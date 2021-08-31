@extends('layout.default')
@section('content')
    <div class="card card-custom col-lg-8 mx-auto">
        <div class="card-header">
            <h3 class="card-title">
                Change Password
            </h3>
        </div>
        <!--begin::Form-->
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->has('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->has('error') }}
            </div>
        @endif
        <form method="post" action="{{ route('profil.admin.update.password') }}">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Old Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control " name="password" placeholder="Old Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control " name="new_password" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control " name="confirmation_password"
                        placeholder="Password confirmation">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Change</button>
                <a href="#" class="btn btn-dark">Back</a>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
