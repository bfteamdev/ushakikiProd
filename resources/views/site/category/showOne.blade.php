@extends('layout.app')
@section('style')
<link rel="stylesheet" href="{{ asset('app-assets/css/flexslider.css') }}" media="screen" />
@endsection
@section('content')
    <div class="single-page main-grid-border">
        <div class="container">
            <ol class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="index.html">Home</a></li>
                <li><a href="all-classifieds.html">All Ads</a></li>
                <li class="active"><a href="mobiles.html">Mobiles</a></li>
                <li class="active">Mobile Phone</li>
            </ol>
            <div class="product-desc row">
                @foreach ($anno as $item)               

                <div class="col-md-7 product-view">
                    <h2>{{ $item->title }}</h2>
                    <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>| Added at
                        {{ $item->created_at }}, Ad ID: 987654321</p>
                    <div class="flexslider">

                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides"
                                style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-1875px, 0px, 0px);">
                                @foreach ($item->photos as $items)
    
                                
                                <li data-thumb="{{ asset('storage/'.$items->name) }}" class="clone" aria-hidden="true"
                                    style="width: 625px; float: left; display: block;">
                                    <img src="{{ asset('storage/'.$items->name) }}" draggable="false">
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <ol class="flex-control-nav flex-control-thumbs">
                            @foreach ($item->photos as $photo)

                            <li><img src="{{asset('storage/'.$photo->name)}}" class="" draggable="false"></li>
                            @endforeach
                           
                        </ol>
                        <ul class="flex-direction-nav">
                            <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li>
                            <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
                        </ul>
                    </div>
                    <!-- FlexSlider -->
                   
                    <!-- //FlexSlider -->
                    <div class="product-details">
                        <h4>Brand : <a href="#">Company name</a></h4>
                        <h4>Views : <strong>150</strong></h4>
                        <p><strong>Display </strong>: 1.5 inch HD LCD Touch Screen</p>
                        <p><strong>Summary</strong> :{{$item->description}}</p>

                    </div>
                </div>
                <div class="col-md-5 product-details-grid">
                    <div class="item-price">
                        <div class="product-price">
                            <p class="p-price">Price</p>
                            <h3 class="rate">{{ $item->price }} Fbu</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="condition">
                            <p class="p-price">Condition</p>
                            <h4>Good</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="itemtype">
                            <p class="p-price">Item Type</p>
                            <h4>{{ $item->category->name ?? $item->type->name }}</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="interested text-center">
                        <h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
                        <p><i class="glyphicon glyphicon-earphone"></i>{{ $item->user->phone }}</p>
                    </div>
                    <div class="tips">
                        <h4>Safety Tips for Buyers</h4>
                        <ol>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                            <li><a href="#">Contrary to popular belief.</a></li>
                        </ol>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
           
        </div>
    </div>
 
@endsection
@section('script')
<script defer="" src="{{ asset('app-assets/js/jquery.flexslider.js') }}"></script>
{{-- <link rel="stylesheet" href="{{ asset('app-assets/css/flexslider.css') }}" type="text/css"
    media="screen"> --}}

<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });

</script>
@endsection
