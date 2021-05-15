@extends('layout.app')
@section('title')Home @endsection
@php
use App\Classes\UrlRandom;
@endphp
@section('content')
    <div class="main-banner banner text-center">
        <div class="container d-flex flex-column align-items-center"
            style="align-items: center;display: flex;flex-direction: column;">
            <h1>USHAKIKI</h1>
            <div class="separateTitle"></div>
            {{-- <a href="#" class="post"><i class="fa fa-pencil-square-o"></i> Post a new Ad</a> --}}
        </div>
        <form id="formSearch"action="{{ route('search.home') }}" method="GET">
            @csrf
            <div class="d-flex justify-content-center align-items-center">
                <div class="search col-lg-5 col-md-8 col-sm-10">
                    <input type="search" class="searchInput" name="q" id="search" placeholder="Search....." autocomplete="off">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <ul class="autosearch">
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                        <li>ushakiki</li>
                    </ul>
                </div>
            </div>
        </form>
        <div class="containerCategory">
            @foreach ($group as $key => $item)
                <a href="{{ route('category.show', ['group' => $item->id, 'name' => $item->name]) }}"
                    class="rond bg{{ $key + 1 }}">
                    <i class="{{ $item->icon }}"></i>
                    <span class="nameCategory">{{ $item->name }}</span>
                    <div class="separateName"></div>
                    <span class="option">Achat / vente / location</span>
                </a>
            @endforeach
        </div>
    </div>
    <div class="content">
        <div class="categories">
            <div class="container">
                <h2 class="head">ABOUT</h2>
                <div class="work-section-head text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In dolorem porro aspernatur suscipit
                        pariatur dignissimos eveniet qui expedita error, minima, delectus, ipsam cupiditate neque
                        repudiandae. Dolore asperiores nostrum laborum voluptatem modi minus, ratione repellat aspernatur
                        pariatur corrupti minima doloribus ducimus omnis, maiores beatae enim vel placeat.</p>
                </div>
                <h2 class="head">How work it</h2>
                <div class="work-section-grids text-center row"
                    style="display: flex;align-items: baseline;justify-content: center;">
                    <div class="col-md-3 work-section-grid">
                        <i class="fas fa-edit"></i>
                        <h4>Post an Ad</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                        <span class="arrow1"><img src="{{ asset('app-assets/images/arrow1.png') }}" alt=""></span>
                    </div>
                    <div class="col-md-3 work-section-grid">
                        <i class="fa fa-eye" style="color: var(--color2)"></i>
                        <h4>Find an item</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                        <span class="arrow2"><img src="{{ asset('app-assets/images/arrow2.png') }}" alt=""></span>
                    </div>
                    <div class="col-md-3 work-section-grid">
                        <i class="fa fa-phone" style="color: var(--color3)"></i>
                        <h4>contact the seller</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                        {{-- <span class="arrow1"><img src="{{ asset('app-assets/images/arrow1.png') }}" alt=""></span> --}}
                    </div>
                    {{-- <div class="col-md-3 work-section-grid">
                        <i class="fa fa-money"></i>
                        <h4>make transactions</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                    </div> --}}
                    <div class="clearfix"></div>
                    <a class="work col-md-2" href="#">Get start Now</a>
                </div>
            </div>
        </div>

        <div class="trending-ads">
            <div class="mobile-app">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <div class="d-flex row">
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p1.jpg') }}" />
                                                    <span class="price">&#36; 450</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>There are many variations of passages</h5>
                                                    <span>1 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p2.jpg') }}" />
                                                    <span class="price">&#36; 399</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>Lorem Ipsum is simply dummy</h5>
                                                    <span>3 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p3.jpg') }}" />
                                                    <span class="price">&#36; 199</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>It is a long established fact that a reader</h5>
                                                    <span>8 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p4.jpg') }}" />
                                                    <span class="price">&#36; 159</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>passage of Lorem Ipsum you need to be</h5>
                                                    <span>19 hour ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <div class="d-flex row">
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p1.jpg') }}" />
                                                    <span class="price">&#36; 450</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>There are many variations of passages</h5>
                                                    <span>1 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p2.jpg') }}" />
                                                    <span class="price">&#36; 399</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>Lorem Ipsum is simply dummy</h5>
                                                    <span>3 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p3.jpg') }}" />
                                                    <span class="price">&#36; 199</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>It is a long established fact that a reader</h5>
                                                    <span>8 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p4.jpg') }}" />
                                                    <span class="price">&#36; 159</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>passage of Lorem Ipsum you need to be</h5>
                                                    <span>19 hour ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="10000">
                                        <div class="d-flex row">
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p1.jpg') }}" />
                                                    <span class="price">&#36; 450</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>There are many variations of passages</h5>
                                                    <span>1 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p2.jpg') }}" />
                                                    <span class="price">&#36; 399</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>Lorem Ipsum is simply dummy</h5>
                                                    <span>3 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p3.jpg') }}" />
                                                    <span class="price">&#36; 199</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>It is a long established fact that a reader</h5>
                                                    <span>8 hour ago</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="single.html">
                                                    <img src="{{ asset('app-assets/images/p4.jpg') }}" />
                                                    <span class="price">&#36; 159</span>
                                                </a>
                                                <div class="ad-info">
                                                    <h5>passage of Lorem Ipsum you need to be</h5>
                                                    <span>19 hour ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //slider -->
        </div>
    </div>
@endsection
@section('style')
    <style rel="preload" as="style">
        .carousel-control-next,
        .carousel-control-prev {
            /* right: -80px !important; */
            width: 55px !important;
            background: #000000b8 !important;
        }

        .carousel-control-prev {
            height: 45px;
            top: 40%;
            left: -60px !important
        }

        .carousel-control-next {
            height: 45px;
            top: 40%;
            right: -60px !important
        }

    </style>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection
@section('script')
    <script src="{{ asset("app-assets/js/search.js") }}"></script>
@endsection
