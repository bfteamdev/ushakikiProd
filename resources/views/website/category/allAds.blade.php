@extends('layout.app')
@section('title') Category-car @endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap-select.css') }}">
    <style rel="preload" as="style">
        .breadcrumb-item.active {
            color: black !important;
        }

        .breadcrumb-item a {
            color: #6c757d !important;
            text-decoration: none !important;
        }

    </style>
@endsection
@section('content')
    <div class="total-ads main-grid-border">
        <div class="container">
            <nav aria-label="Page breadcrumb my-3" style="width: 101%;left: -11px;position: relative;margin:15px 0;">
                <ol class="breadcrumb" style="margin-bottom: 5px;">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="categories.html">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cars</li>
                </ol>
            </nav>
            @livewire('customize-search', ['products' => $products,"name"=>$name])
        </div>
    </div>
@endsection
