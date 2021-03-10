@extends('layout.default')
@section('content')
    <div class="card card-custom gutter-b example example-compact col-lg-7 mx-auto">
        <div class="card-header">
            <h3 class="card-title">Create a new client</h3>
        </div>
        <!--begin::Form-->
        <form class="form" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.client.form')
        </form>
        <!--end::Form-->
    </div>
@endsection
