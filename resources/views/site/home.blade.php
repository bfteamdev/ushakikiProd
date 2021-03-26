@extends('layout.app')
@section('title')
    <title>home</title>
@endsection
@section('content')
    <div class="main-banner banner text-center">
        <div class="container d-flex flex-column align-items-center"
            style="align-items: center;display: flex;flex-direction: column;">
            <h1>USHAKIKI</h1>
            <div class="separateTitle"></div>
            {{-- <a href="#" class="post"><i class="fa fa-pencil-square-o"></i> Post a new Ad</a> --}}
        </div>
        <div class="container search">
            <input type="search" class="searchInput" name="" id="" placeholder="Search.....">
            <i class="fa fa-search"></i>
        </div>
        <div class="container containerCategory">
            <a href="#" class="rond bg1">
                <i class="far fa-angry"></i>
                <span class="nameCategory">Immobilier</span>
                <div class="separateName"></div>
                <span class="option">Achat / vente / location</span>
                {{-- <div class="badge">23</div> --}}
            </a>
            <a href="#" class="rond bg2">
                <i class="fa fa-home"></i>
                <span class="nameCategory">Immobilier</span>
                <div class="separateName"></div>
                <span class="option">Achat / vente / location</span>
            </a>
            <a href="#" class="rond bg3">
                <i class="fa fa-home"></i>
                <span class="nameCategory">Immobilier</span>
                <div class="separateName"></div>
                <span class="option">Achat / vente / location</span>
            </a>
            <a href="#" class="rond bg4">
                <i class="fa fa-home"></i>
                <span class="nameCategory">Immobilier</span>
                <div class="separateName"></div>
                <span class="option">Achat / vente / location</span>
            </a>
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
                <div class="work-section-grids text-center">
                    <div class="col-md-3 work-section-grid">
                        <i class="fa fa-pencil-square-o"></i>
                        <h4>Post an Ad</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                        <span class="arrow1"><img src="{{ asset('app-assets/images/arrow1.png') }}" alt=""></span>
                    </div>
                    <div class="col-md-3 work-section-grid">
                        <i class="fa fa-eye"></i>
                        <h4>Find an item</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                        <span class="arrow2"><img src="{{ asset('app-assets/images/arrow2.png') }}" alt=""></span>
                    </div>
                    <div class="col-md-3 work-section-grid">
                        <i class="fa fa-phone"></i>
                        <h4>contact the seller</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                        <span class="arrow1"><img src="{{ asset('app-assets/images/arrow1.png') }}" alt=""></span>
                    </div>
                    <div class="col-md-3 work-section-grid">
                        <i class="fa fa-money"></i>
                        <h4>make transactions</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <a class="work" href="#">Get start Now</a>
                </div>
            </div>
        </div>
        <div class="trending-ads">
            <div class="mobile-app">
                <div class="container">
                    <div class="trend-ads">
                        <ul id="flexiselDemo3">
                            <li>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p1.jpg') }}" />
                                        <span class="price">&#36; 450</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>There are many variations of passages</h5>
                                        <span>1 hour ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p2.jpg') }}" />
                                        <span class="price">&#36; 399</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>Lorem Ipsum is simply dummy</h5>
                                        <span>3 hour ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p3.jpg') }}" />
                                        <span class="price">&#36; 199</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>It is a long established fact that a reader</h5>
                                        <span>8 hour ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p4.jpg') }}" />
                                        <span class="price">&#36; 159</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>passage of Lorem Ipsum you need to be</h5>
                                        <span>19 hour ago</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p5.jpg') }}" />
                                        <span class="price">&#36; 1599</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>There are many variations of passages</h5>
                                        <span>1 hour ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p6.jpg') }}" />
                                        <span class="price">&#36; 1099</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>passage of Lorem Ipsum you need to be</h5>
                                        <span>1 day ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p7.jpg') }}" />
                                        <span class="price">&#36; 109</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>It is a long established fact that a reader</h5>
                                        <span>9 hour ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p8.jpg') }}" />
                                        <span class="price">&#36; 189</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>Lorem Ipsum is simply dummy</h5>
                                        <span>3 hour ago</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p9.jpg') }}" />
                                        <span class="price">&#36; 2599</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>Lorem Ipsum is simply dummy</h5>
                                        <span>3 hour ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p10.jpg') }}" />
                                        <span class="price">&#36; 3999</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>It is a long established fact that a reader</h5>
                                        <span>9 hour ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p11.jpg') }}" />
                                        <span class="price">&#36; 2699</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>passage of Lorem Ipsum you need to be</h5>
                                        <span>1 day ago</span>
                                    </div>
                                </div>
                                <div class="col-md-3 biseller-column">
                                    <a href="single.html">
                                        <img src="{{ asset('app-assets/images/p12.jpg') }}" />
                                        <span class="price">&#36; 899</span>
                                    </a>
                                    <div class="ad-info">
                                        <h5>There are many variations of passages</h5>
                                        <span>1 hour ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- //slider -->
        </div>
        {{-- <div class="mobile-app">
            <div class="container">
                <div class="col-md-5 app-left">
                    <a href="mobileapp.html"><img src="{{ asset('app-assets/images/app.png') }}" alt=""></a>
                </div>
                <div class="col-md-7 app-right">
                    <h3>Resale App is the <span>Easiest</span> way for Selling and buying second-hand goods</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor Sed bibendum varius euismod.
                        Integer eget turpis sit amet lorem rutrum ullamcorper sed sed dui. vestibulum odio at elementum.
                        Suspendisse et condimentum nibh.</p>
                    <div class="app-buttons">
                        <div class="app-button">
                            <a href="#"><img src="{{ asset('app-assets/images/1.png') }}" alt=""></a>
                        </div>
                        <div class="app-button">
                            <a href="#"><img src="{{ asset('app-assets/images/2.png') }}" alt=""></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div> --}}
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo3").flexisel({
                visibleItems: 1,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 5000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 1
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 1
                    }
                }
            });

        });

    </script>
    <script type="text/javascript" src="{{ asset('app-assets/js/jquery.flexisel.js') }}"></script>
@endsection
