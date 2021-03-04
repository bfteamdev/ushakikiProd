@extends('layout.default')
@section('content')
    <div class="card card-custom gutter-b example example-compact col-lg-7 mx-auto">
        <div class="card-header">
            <h3 class="card-title">Enregistre un nouveau client</h3>
        </div>
        <!--begin::Form-->
        <form class="form" action="{{ route('client.store') }}" method="POST">
            @csrf
            @include('admin.client.form')
        </form>
        <!--end::Form-->
    </div>
@endsection
