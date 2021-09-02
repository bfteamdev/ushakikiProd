@extends('layout.app')
@section('homeDashboard') active @endsection
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
                        </div>
                    </div>
                    <!--end::Header-->
                    <div class="categories">
                        <div class="container">
                            <div class="row">
                                @foreach ($group as $item)
                                    <div class="groupCatg col-lg-12">
                                        <div class="groupName">{{ $item->name }}</div>
                                        <div class="d-flex flex-wrap" style="width: 100%; margin:12px 4px;">
                                            @foreach ($item->categories as $items)
                                                <div class="focus-grid">
                                                    <a href="{{ route('ad.by.category', ['id' => $items->id]) }}">
                                                        <div class="focus-layout focus-border">
                                                            <div class="focus-image"><i class="{{ $items->icon }}"></i>
                                                            </div>
                                                            <div class="d-flex flex-wrap justify-content-between ml-3">
                                                                <h4 class="clrchg" style="width: 100%; text-align: end;">
                                                                    {{ $items->name }}</h4>
                                                                @if ($items->type_count != 0)
                                                                    <h3
                                                                        style="width: 100%;margin: 0;font-size: 15px;font-weight: bold;text-align: end;color: #383838;">
                                                                        {{ $items->type_count }}</h3>
                                                                @else
                                                                    <h3
                                                                        style="width: 100%;margin: 0;font-size: 15px;font-weight: bold;text-align: end;color: #383838;">
                                                                        {{ $items->ads_count }}</h3>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet">
@endsection
