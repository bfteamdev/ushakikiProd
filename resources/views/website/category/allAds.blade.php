@extends('layout.app')
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
@section('script')
    <script>
        // ................................................
        const btn_fb = document.getElementById('fb-btn');
        let postUrl = encodeURI(document.location.href);
        let postTitle = encodeURI('{{ $name }}');
        btn_fb.setAttribute("href", `https://www.facebook.com/sharer.php?u=${postUrl}&title=${postTitle}`);
        btn_fb.addEventListener('click', () => {
            navigator.share({
                title: postTitle,
                url: postUrl
            }).then((result) => {
                alert("thank you for sharing")
            }).catch((err)=>{
                console.log(err);
            })
        })
    </script>

@endsection
