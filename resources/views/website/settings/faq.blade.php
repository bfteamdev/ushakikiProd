@extends('layout.app')
@section('style')
    <style>
        .banner {
            position: relative;
            background: url(../app-assets/images/banner.jpg) no-repeat 0px 0px;
            background-size: cover;
            min-height: 240px;
            padding: 45px 0 0 0;
            z-index: 1000;
        }

        .banner h1 {
            color: #fff;
            font-family: "Intro Inline";
            font-size: 6rem;
            text-align: left;
            user-select: none;
        }

        .banner p {
            color: #eaeaea;
            font-size: 16px;
            text-align: left;
            user-select: none;
        }

    </style>
@endsection
@section('content')
    <div class="banner text-center">
        <div class="container">
            <h1>FAQs</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
    </div>
    <div class="faq main-grid-border">
        <div class="container">
            <h2 class="head">FAQS</h2>
            <dl class="faq-list">
                @foreach ($faq as $item)
                    <div>
                        <dt class="faq-list_h">
                            <span class="marker">Q?&nbsp;</span>
                            <span class="marker_head">{{ $item->question }}</span>
                        </dt>
                        <dd><?= $item->response ?>
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection
