@extends('layout.app')

@section('content')

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
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
                        </div>
                    </div>
                    <!--end::Header-->
                    <div class="categories">
                        <div class="container">
                            <div class="row">

                                {{-- @foreach ($type as $item)
                                    <div class="col-md-2 focus-grid mt-2">
                                        <a href="{{ route('ad.by.type',['id'=>$item->id,'name'=>$item->name]) }}">
                                            <div class="focus-border">
                                                <div class="focus-layout">
                                                    <div class="focus-image"><i class="{{ $item->category->icon }}"></i></div>
                                                    <h4 class="clrchg">{{ $item->name }}</h4>
                                                    <br>
                                                    <span>{{ $item->ads_count }}&nbsp;Ads</span>
                                                </div> --}}
                                <div class="groupCatg col-lg-12">
                                    <div class="groupName">{{ $cat->name }}</div>
                                    <div class="d-flex flex-wrap" style="width: 100%; margin:12px 4px;">
                                        @foreach ($type as $item)
                                            <div class="focus-grid">
                                                <a
                                                    href="{{ route('ad.by.type', ['id' => $item->id, 'name' => $item->name]) }}">
                                                    <div class="focus-layout focus-border">
                                                        <div class="focus-image"><i
                                                                class="{{ $item->category->icon }}"></i>
                                                        </div>
                                                        <div class="d-flex flex-wrap justify-content-between ml-3">
                                                            <h4 class="clrchg" style="width: 100%; text-align: end;">
                                                                {{ $item->name }}</h4>
                                                            <h3
                                                                style="width: 100%;margin: 0;font-size: 15px;font-weight: bold;text-align: end;color: #383838;">
                                                                {{ count($adsCount[$item->id]) }}</h3>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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
