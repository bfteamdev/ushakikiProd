@extends('layout.app')
@section('homeDashboard') active @endsection
@section('content')
@section('dashboardActive') active @endsection
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->has('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->has('success') }}
            </div>
        @endif
        <div class="d-flex flex-row my-5">
            <!--begin::Aside-->
            @include('website.dashbaord.sidebar')
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8 grayBg">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        {{-- <h2 class=" text-center">Mes Annonces</h2> --}}
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">My dashboard</h3>
                        </div>
                    </div>
                    <!--end::Header-->
                    <div class="categories">
                        <div class="container">
                            <div class="row">
                                @foreach ($category as $item)
                                    {{-- @foreach ($nbre as $nbres) --}}
                                    <div class="col-md-2 focus-grid mt-2">
                                        <a href="{{ route('ad.by.category', ['id' => $item->id]) }}">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="{{ $item->icon }}"></i></div>
                                                    <h4 class="clrchg">{{ $item->name }}</h4><br>
                                                    <span>{{ number_format(array_sum($adsCount[$item->id])) }}&nbsp;Ads</span>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- @endforeach --}}
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
    </div>
@endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet">
@endsection
