@extends('layout.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard Client') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                       
                    </div>
                </div>
            </div>
        </div>

    </div> --}}

    <div class="container">
        @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->has('error') }}
        </div>
    @endif
        <div class="my-5">
            <h2>Mon compte</h2>
        </div>
        <div class="col-md-3">
            <div class="widget">
                <ul class="categorie ">

                    <li><a class="list-group-item" href="">list ads</a></li>
                    <li><a class="list-group-item" href="">create ads</a></li>
                    <li><a class="list-group-item" href="">Profil</a></li>
                    <li><a class="list-group-item " href="">setting</a></li>

                </ul>
                {{-- <a class="list-group-item" href=""></a>
                    <a class="list-group-item" href="">Gestion des categories</a> --}}
            </div>


        </div>
    </div>


@endsection
{{-- <div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb"><a href="index.php">Accueil</a><span class="delimiter"><i
                    class="fa fa-angle-right"></i></span>Mon Pesabay</nav>
        <div id="primary" class="content-area">
            <main id="main" class="site-main">


                <article id="post-8" class="post-8 page type-page status-publish hentry">

                    <header class="entry-header">
                        <h1 class="entry-title">Mon Pesabay</h1>
                    </header><!-- .entry-header -->
                    <div class="entry-content">
                        <div class="woocommerce">

                            <div class="woocommerce-MyAccount-content">

                                <p> Bienvenue <strong> Fleury </strong> (vous n'êtes pas <strong> Fleury </strong>? <a
                                        href="index.php?page=logout">déconnectez vous </a>) </p>
                                <p> A partir de votre compte, vous pouvez <a href="index.php?page=step1"> vendre un
                                        produit </a> ou voir <br>
                                    Vos <a href="index.php?page=my-orders"> recents achats</a>, <br> Vos <a
                                        href="index.php?page=my-sales"> ventes</a>, <br> Gérez votre <a
                                        href="index.php?page=my-details"> compte </a> ainsi que
                                    vos <a href="index.php?page=my-items"> produits</a>.</p>
                            </div>
                        </div>
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar" role="complementary">
            <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                <ul class="product-categories category-single">
                    <li class="product_cat">
                        <ul>
                            <li class="cat-item current-cat"><a href="index.php?page=my-pesabay"><span
                                        class="no-child"></span>Mon Pesabay </a> </li>
                            <li class="cat-item "><a href="index.php?page=my-details"><span class="no-child"></span>
                                    Details </a> </li>
                            <li class="cat-item "><a href="index.php?page=change-password"><span
                                        class="no-child"></span> Change Mot de passe </a> </li>
                            <!-- <li class="cat-item "><a href="index.php?page=my-addresses"> Addresses </a> </li> -->
                            <li class="cat-item "><a href="index.php?page=my-orders"><span class="no-child"></span>
                                    Achats </a> </li>
                            <li class="cat-item "><a href="index.php?page=my-sales"><span class="no-child"></span>
                                    Ventes </a> </li>
                            <li class="cat-item "><a href="index.php?page=my-items"><span class="no-child"></span>
                                    Produits </a> </li>
                            <li class="cat-item "><a href="index.php?page=my-wishlist"><span class="no-child"></span>
                                    Favoris </a> </li>
                            <li class="cat-item">

                                <ul class="show-all-cat">
                                    <li class="product_cat "><span class="show-all-cat-dropdown">Messages<span
                                                class="child-indicator"><i class="fa fa-angle-right"></i></span></span>
                                        <ul style="display: none;">

                                            <li class="cat-item"><a href="index.php?page=my-messages"><span
                                                        class="no-child"></span>Boîte de réception </a></li>
                                            <li class="cat-item"><a href="index.php?page=sent-messages"><span
                                                        class="no-child"></span>Messages envoyés</a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </li>

                        </ul>
                    </li>
                </ul>
            </aside>

            <!-- <ul class="show-all-cat">
            <li class="product_cat"><span class="show-all-cat-dropdown">Message</span>
                <ul>
                    <li class="cat-item"><a href="index.php?page=inbox"> Inbox </a> <span class="count">(0)</span></li>
                    <li class="cat-item"><a href="index.php?page=sent">Sent</a> <span class="count">(1)</span></li>
                </ul>    
            </li>
            </ul> -->
        </div>


    </div><!-- .col-full -->
</div> --}}
