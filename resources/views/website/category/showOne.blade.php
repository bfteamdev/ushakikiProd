@php
use App\Models\Feature;
@endphp
@extends('layout.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('app-assets/css/flexslider.css') }}" media="screen" rel="preload" as="style"/>
    <style rel="preload" as="style">
        .breadcrumb-item a.active {
            color: black !important;
        }

        .breadcrumb-item a {
            color: #6c757d !important;
            text-decoration: none !important;
        }

    </style>
@endsection
@section('content')
    <div class="single-page main-grid-border">
        <div class="container">
            <nav aria-label="Page breadcrumb" style="left: -12px;position: relative;width: 101%;">
                <ol class="breadcrumb" style="margin-bottom: 5px;">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="#">
                            {{-- href="{{ route('category.show', ['group' => !is_null($type) ? $groupe->id : $ads->category->groupe->id, 'name' => !is_null($type) ? $groupe->name : $ads->category->groupe->name]) }}"> --}}
                            {{ !is_null($type) ? $groupe->name : $ads->category->groupe->name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="{{ is_null($ads->type) ? 'active' : '' }}" href="#">
                            {{ !is_null($type) ? $category->name : $ads->category->name }}
                        </a>
                    </li>
                    @if (!is_null($ads->type))
                        <li class="breadcrumb-item active">
                            <a class="active" href="#">
                                {{ $type->name }}
                            </a>
                        </li>
                    @endif
                </ol>
            </nav>
            <div class="product-desc row">
                <div class="col-md-7 product-view">
                    <h2>{{ $ads->title }}</h2>
                    <p> <i class="glyphicon glyphicon-map-marker fas fa-map-marker-alt"></i><a href="#">state</a>, <a
                            href="#">city</a> | Added
                        at {{ $ads->created_at }}</p>
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach ($ads->photos as $items)
                            @if ($items->display === 1)
                            <li data-thumb="{{ asset('storage/' . $items->name) }}" class="clone" aria-hidden="true"
                                style="width: 625px; float: left; display: block;">
                                <img src="{{ asset('storage/' . $items->name) }}"
                                    alt="imageOfAd-xxxxx-{{ $items->id }}" draggable="false">
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="row">
                        @foreach ($idFeat as $feature_id)
                            <div class="card p-0 mb-3 border-0">
                                @foreach (Feature::where('id', $feature_id)->get() as $x)
                                    <div class="card-header font-weight-bold"
                                        style="background-color: var(--color1); color:var(--dark)">
                                        {{ $x->title }}
                                    </div>
                                @endforeach
                                <div class="card-body">
                                    @foreach ($ads->featuresAds as $items)
                                        <div class="d-flex borderBottomDetail">
                                            <div class="col-lg-3 border-right py-2 px-0">
                                                <strong>{{ $items->field->name }}
                                                    : </strong>
                                            </div> &nbsp; {{ $items->value }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="card p-0">
                            <div class="card-header font-weight-bold"
                                style="background-color: var(--color1); color:var(--dark)">
                                Description
                            </div>
                            <div class="card-body cardScroll">
                                <?= $ads->description ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 product-details-grid">
                    <div class="item-price">
                        <div class="product-price">
                            <p class="p-price">Price</p>
                            <h3 class="rate">{{ number_format($ads->price) }}&nbsp;Fbu</h3>
                        </div>
                        <div class="condition">
                            <p class="p-price">Condition</p>
                            <h4>Good</h4>
                        </div>
                        <div class="itemtype">
                            <p class="p-price">Category</p>
                            <h4>
                                {{ !is_null($ads->type) ? $ads->type->category->name . '/' . $ads->type->name : $ads->category->name }}
                            </h4>
                        </div>
                    </div>
                    {{-- <div class="interested text-center">
                        <h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
                        <p><i class="glyphicon glyphicon-earphone"></i>{{ $ads->user->phone }}</p>
                    </div> --}}
                    <div class="tips">
                        <div class="tips-header">Contact</div>
                        <div class="tips-body">
                            <div class="tips-userInfo">
                                <i class="fas fa-user-circle"></i>
                                <span>{{ $ads->user->firstName }} {{ $ads->user->lastName }}</span>
                            </div>
                            <div class="tips-userInfo">
                                <i class="fas fa-comment-dots"></i>
                                <span>Send Message</span>
                            </div>
                            <div class="tips-userInfo">
                                <i class="fas fa-phone"></i>
                                <span>+257 {{ $ads->user->phone }}</span>
                            </div>
                            <div class="tips-userLocation">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="location">
                                    <span><b>Commune : &nbsp;</b> {{ $ads->commune }}</span>
                                    <span><b>Zone : &nbsp;</b> {{ $ads->zone }}</span>
                                </div>
                            </div>
                            <div class="tips-userInfo">
                                <i class="fas fa-info-circle"></i>
                                <span>More information</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="d-flex row">
                <div class="col-md-2 border">
                    <a href="single.html">
                        <img src="{{ asset('app-assets/images/p1.jpg') }}" />
                        {{-- <span class="price">&#36; 450</span> --}}
                    </a>
                    <div class="ad-info">
                        <h5>There are many variations of passages</h5>
                        <span>1 hour ago</span>
                    </div>
                </div>
                <div class="col-md-2 border">
                    <a href="single.html">
                        <img src="{{ asset('app-assets/images/p2.jpg') }}" />
                        {{-- <span class="price">&#36; 399</span> --}}
                    </a>
                    <div class="ad-info">
                        <h5>Lorem Ipsum is simply dummy</h5>
                        <span>3 hour ago</span>
                    </div>
                </div>
                <div class="col-md-2 border">
                    <a href="single.html">
                        <img src="{{ asset('app-assets/images/p3.jpg') }}" />
                        {{-- <span class="price">&#36; 199</span> --}}
                    </a>
                    <div class="ad-info">
                        <h5>It is a long established fact that a reader</h5>
                        <span>8 hour ago</span>
                    </div>
                </div>
                <div class="col-md-2 border">
                    <a href="single.html">
                        <img src="{{ asset('app-assets/images/p4.jpg') }}" />
                        {{-- <span class="price">&#36; 159</span> --}}
                    </a>
                    <div class="ad-info">
                        <h5>passage of Lorem Ipsum you need to be</h5>
                        <span>19 hour ago</span>
                    </div>
                </div>
                <div class="col-md-2 border">
                    <a href="single.html">
                        <img src="{{ asset('app-assets/images/p3.jpg') }}" />
                        {{-- <span class="price">&#36; 199</span> --}}
                    </a>
                    <div class="ad-info">
                        <h5>It is a long established fact that a reader</h5>
                        <span>8 hour ago</span>
                    </div>
                </div>
                <div class="col-md-2 border">
                    <a href="single.html">
                        <img src="{{ asset('app-assets/images/p4.jpg') }}" />
                        {{-- <span class="price">&#36; 159</span> --}}
                    </a>
                    <div class="ad-info">
                        <h5>passage of Lorem Ipsum you need to be</h5>
                        <span>19 hour ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($ads->user_id == Auth::user()->id)
        <div id="chat" class="chat">
            <i class="fas fa-comment-dots"></i>
        </div>
        <div id="popupChat" class="popupChat col-lg-3 col-md-6 col-sm-9">
            <form id="form" action="{{ route('message.store', ['idReceiver' => $ads->user->id]) }}" method="post"
                style="height: 100%">
                @csrf
                @method("post")
                <div class="message">
                    <div class="message-header">
                        <div class="header-profil">
                            <img src="{{ asset('storage/' . $ads->user->profil) }}" alt="">
                        </div>
                        <span class="name">{{ $ads->user->username }}</span>
                        <i class="ki ki-close icon-1x" id="closePopup"></i>
                    </div>
                    @if (Auth::check())
                        @livewire('chat', ['receiver_id' => $ads->user->id,"sender_id"=>Auth::user()->id], key($user->id))
                    @else
                        <div class="message-body">
                            <div class="message-body-sender equare">Bonjour</div>
                            <div class="message-body-receiver equare">Bjr</div>
                        </div>
                    @endif
                    <div class="message-footer">
                        <div class="message-input">
                            <textarea id="message" name="message" placeholder="Votre message ....."></textarea>
                        </div>
                        <button class="message-send" type="submit">Send<i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection

@section('script')
    <script defer src="{{ asset('app-assets/js/jquery.flexslider.js') }}" rel="preload" as="script"></script>
    {{-- <link rel="stylesheet" href="{{ asset('app-assets/css/flexslider.css') }}" type="text/css"
    media="screen"> --}}
    <script defer>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
        let scrollBottom = document.querySelector(".message-body")
        if (scrollBottom) {
            scrollBottom.scrollTop = scrollBottom.scrollHeight;
        }
    </script>
    @if ($ads->user_id == Auth::user()->id)
        <script src="{{ asset('app-assets/js/popup.js') }}" rel="preload" as="script"></script>
        <script>
            let scrollBottom = document.querySelector(".message-body")
            scrollBottom.scrollTop = scrollBottom.scrollHeight;
        </script>
    @endif
@endsection
