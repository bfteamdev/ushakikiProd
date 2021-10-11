@php
use App\Models\Feature;
@endphp
@extends('layout.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('app-assets/css/flexslider.css') }}" media="screen" rel="preload" as="style" />
    <style rel="preload" as="style">
        .breadcrumb-item a.active {
            color: black !important;
        }

        .breadcrumb-item a {
            color: #6c757d !important;
            text-decoration: none !important;
        }

        .btn-share-fb {
            color: #ffffff !important;
            display: flex;
            align-items: center;
            border-radius: 8px;
            padding: 8px 10px;
            text-decoration: none !important;
            background-color: #0466f7;
        }

        .btn-share-whtspp {
            color: #ffffff !important;
            display: flex;
            align-items: center;
            border-radius: 8px;
            padding: 8px 10px;
            text-decoration: none !important;
            background-color: #10882b;
        }

        .btn-share-fb:hover {
            transition: background-color 0.3s ease-in-out;
            background-color: #00378a !important;
        }

        .btn-share-whtspp:hover {
            transition: background-color 0.3s ease-in-out;
            background-color: #0c531c !important;
        }

        .btn-share-fb i {
            color: inherit;
        }
        .btn-share-whtspp i {
            color: inherit;
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
                            {{-- @dump($ads->photos) --}}
                            @foreach ($ads->photos as $items)
                                @if ($items->display === 1)
                                    <li data-thumb="{{ asset('storage/' . $items->name) }}" class="clone"
                                        aria-hidden="true" style="width: 625px; float: left; display: block;">
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
                            <div class="tips-userInfo" id="chat" style="cursor: pointer;">
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
                            <div class="tips-userInfo d-flex justify-content-between">
                                <a class="btn-share-fb" id="fb-btn" target="_blank"
                                    style="background-color: #0466f7;">
                                    <i class="fab fa-facebook" aria-hidden="true"></i>&nbsp;share
                                </a>
                                <a class="btn-share-whtspp" id="wp-btn" target="_blank"
                                    style="background-color: #10882b;">
                                    <i class="fab fa-whatsapp"></i>&nbsp;share
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="suggestion">
                <h1>Suggestion</h1>
                @foreach ($randomAds as $item)
                    <div class="suggestion_Ads col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <a
                            href="{{ route('category.product.one', ['name' => $item->category->name ?? $item->type->name, 'id' => $item->id]) }}">
                            <div class="ads-bottom">
                                <img src="{{ asset('storage/' . $item->viewPhoto->name) }}" />
                                <div class="ad-info">
                                    <span class="title">{{ $item->title }}</span>
                                    <span class="priceAds">{{ number_format($item->price) }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="chat">
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
                        <img src="{{ asset('storage/profil/blank.png') }}" alt="imgprofil">
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
    <script src="{{ asset('app-assets/js/popup.js') }}" rel="preload" as="script"></script>
    <script>
        const btn_fb = document.getElementById('fb-btn');
        const wp_btn = document.getElementById('wp-btn');
        let postUrl = encodeURI(document.location.href);
        let postTitle = encodeURI('{{ $ads->title }}');
        btn_fb.setAttribute("href", `https://www.facebook.com/sharer.php?u=${postUrl}&title=${postTitle}`);
        wp_btn.setAttribute("href", `https://wa.me/?text=${postTitle} ${postUrl}`);
        btn_fb.addEventListener('click', () => {
            navigator.share({
                title: postTitle,
                url: postUrl
            }).then((result) => {
                console.log("thank you for sharing")
            }).catch((err) => {
                console.log(err);
            })
        })  
            })
        });
        wp_btn.addEventListener('click', () => {
            navigator.share({
                title: postTitle,
                url: postUrl
            }).then((result) => {
                console.log("thank you for sharing")

            }).catch((err) => {
                console.log(err);
            })
        });
    </script>
@endsection
