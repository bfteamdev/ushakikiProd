@extends('layout.default')
@section('content')
    <div class="card card-custom col-lg-7 mx-auto">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title">
                    Create a new category
                </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('category.store') }}">
            @csrf
            @include('admin.category.form')
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('category.index') }}" class="btn btn-light-dark"><i
                                class="flaticon2-left-arrow-1"></i>Back</a>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2 col-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
