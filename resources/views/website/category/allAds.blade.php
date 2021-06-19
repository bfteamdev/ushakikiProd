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
            <div class="select-box">
                <div class="select-city-for-local-ads ads-list">
                    <label>Select your city to see local ads</label>
                    <select>
                        <optgroup label="Popular Cities">
                            <option selected style="display:none;color:#eee;">Entire USA</option>
                            <option>Birmingham</option>
                            <option>Anchorage</option>
                            <option>Phoenix</option>
                            <option>Little Rock</option>
                            <option>Los Angeles</option>
                            <option>Denver</option>
                            <option>Bridgeport</option>
                            <option>Wilmington</option>
                            <option>Jacksonville</option>
                            <option>Atlanta</option>
                            <option>Honolulu</option>
                            <option>Boise</option>
                            <option>Chicago</option>
                            <option>Indianapolis</option>
                        </optgroup>
                        <optgroup label="Washington">
                            <option>Seattle</option>
                            <option>Spokane</option>
                            <option>Tacoma</option>
                            <option>Vancouver</option>
                            <option>Bellevue</option>
                        </optgroup>
                        <optgroup label="West Virginia">
                            <option>Charleston</option>
                            <option>Huntington</option>
                            <option>Parkersburg</option>
                            <option>Morgantown</option>
                            <option>Wheeling</option>
                        </optgroup>
                        <optgroup label="Wisconsin">
                            <option>Milwaukee</option>
                            <option>Madison</option>
                            <option>Green Bay</option>
                            <option>Kenosha</option>
                            <option>Racine</option>
                        </optgroup>
                        <optgroup label="Wyoming">
                            <option>Cheyenne</option>
                            <option>Casper</option>
                            <option>Laramie</option>
                            <option>Gillette</option>
                            <option>Rock Springs</option>
                        </optgroup>
                        </optgroup>
                    </select>
                </div>
                <div class="browse-category ads-list">
                    <label>Browse Categories</label>
                    <select class="selectpicker show-tick" data-live-search="true">
                        <option data-tokens="Cars">Cars</option>
                        <option data-tokens="Mobiles">Mobiles</option>
                        <option data-tokens="Electronics & Appliances">Electronics & Appliances</option>
                        <option data-tokens="Bikes">Bikes</option>
                        <option data-tokens="Furniture">Furniture</option>
                        <option data-tokens="Pets">Pets</option>
                        <option data-tokens="Books, Sports & Hobbies">Books, Sports & Hobbies</option>
                        <option data-tokens="Fashion">Fashion</option>
                        <option data-tokens="Kids">Kids</option>
                        <option data-tokens="Services">Services</option>
                        <option data-tokens="Jobs">Jobs</option>
                        <option data-tokens="Real Estate">Real Estate</option>
                    </select>
                </div>
                <div class="search-product ads-list">
                    <label>Search for a specific product</label>
                    <div class="search">
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Buscar" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="button">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <nav aria-label="Page breadcrumb">
                <ol class="breadcrumb" style="margin-bottom: 5px;">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="categories.html">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cars</li>
                </ol>
            </nav>
            <div class="ads-grid row">
                <div class="side-bar col-md-3">
                    <div class="search-hotel">
                        <form>
                            <div class="field">
                                <label for="email" class="field-label">Recherche @ex: nom </label>
                                <input type="email" class="field-input allInputs " name="email" value="" autocomplete="off"
                                    aria-autocomplete="off">
                            </div>
                        </form>
                    </div>
                  
                </div>
                <div class="ads-display col-md-9">
                    <div class="wrapper boxView">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active show" id="home"
                                    aria-labelledby="home-tab">
                                    <div id="container">
                                        <div class="clearfix"></div>
                                        <ul class="list">
                                            @foreach ($annonce as $item)                                   
                                            <a href="{{ route('category.product.one',['name'=>$item->category->name ?? $item->type->name,'id'=>$item->id]) }}">
                                                <li>
                                                    <img src="{{ asset('storage/'.$item->viewPhoto->name) }}" title="" alt="" />
                                                    <section class="list-left">
                                                        <h5 class="title">{{$item->title}}</h5>
                                                        <span class="adprice">{{ number_format($item->price)}}&nbsp;Fbu</span>
                                                        <p class="catpath">{{ $name }} » Other {{ $name }}</p>
                                                    </section>
                                                    <section class="list-right">
                                                        <span class="date">Poster: {{ $item->created_at }}</span>
                                                        {{-- <span class="cityname">{{ $item->commune }} {{ $item->zone  }}</span> --}}
                                                    </section>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </a>
                                      
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                {{-- <ul class="d-flex justify-content-center"> --}}
                                    {{-- <ul class="d-flex justify-content-center">
                                        {!! $annonce->links() !!}
                                    </ul> --}}
                                {{-- </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
