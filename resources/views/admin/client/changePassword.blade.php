@extends('layout.default')
@section('content')
@section('activePass') active @endsection
    <div class="d-flex flex-row">
        <!--begin::Aside-->
        <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
            <!--begin::Profile Card-->
            @include('admin.client.leftBar')
            <!--end::Profile Card-->
        </div>
        <div class="flex-row-fluid ml-lg-8">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('client.update.password',['client'=>$client->id]) }}" method="post">
                @csrf
                @method('patch')
                <div class="card card-custom card-stretch">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Change password</h3>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="">New password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror">
                        </div>
                        <div class=" form-group">
                            <input type="submit" class="btn btn-primary" value="change">
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

@endsection
