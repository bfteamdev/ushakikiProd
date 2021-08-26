<!DOCTYPE html>
<html lang="en">

<head>
    <title>USHAKIKI @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"
        rel="preload" as="style">
    {{-- <link href="{{ asset('app-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"
        rel="preload" as="style" /> --}}
    <link href="{{ asset('app-assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" rel="preload"
        as="style" />

    {{-- <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"> --}}
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('app-assets/logo/favicon.ico') }}">

    <link rel="preload" href="{{ asset('app-assets/font/arial-rounded-mt.ttf') }}" as="font"
        crossorigin="anonymous" />
    <link rel="preload" href="{{ asset('app-assets/font/berlin-sans-fb-3.ttf') }}" as="font"
        crossorigin="anonymous" />
    <link rel="preload" href="{{ asset('app-assets/font/Intro Inline.otf') }}" as="font" crossorigin="anonymous" />
    <link rel="preload" href="{{ asset('app-assets/font/Intro.otf') }}" as="font" crossorigin="anonymous" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Ushakiki" />
    <script type="text/javascript" src="{{ asset('app-assets/js/jquery.min.js') }}" rel="preload" as="script">
    </script>
    <script type="application/x-javascript" rel="preload" as="script">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    {{-- Global Theme Styles (used by all pages) --}}
    @foreach (config('layout.resourcesUSHAKIKI.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}"
            rel="stylesheet" type="text/css" rel="preload" as="style" />
    @endforeach
    @foreach (config('layout.resourcesUSHAKIKI.js') as $script)
    <link href="{{ asset($script) }}" type="text/javascript" rel="preload" as="script">
@endforeach
    @livewireStyles
    @yield('style')
</head>

<body style="background-color: transparent !important;">
    {{-- <body> --}}
    @include('layout.partials.include.header')
    <div>
        @include('sweetalert::alert')
        @yield('content')
        <footer>
            @yield('footer')
        </footer>
    </div>
    {{-- Global Theme JS Bundle (used by all pages) --}}
    @foreach (config('layout.resourcesUSHAKIKI.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript" rel="preload" as="script"></script>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"
        rel="preload" as="script">
    </script>
    <!-- Source -->
    <script type="text/javascript" src="{{ asset('app-assets/js/jquery.leanModal.min.js') }}" rel="preload"
        as="script"></script>
    {{-- <script src="{{ asset('app-assets/js/jquery.uls.data.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.data.utils.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.lcd.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.languagefilter.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.regionfilter.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.core.js') }}" rel="preload" as="script"></script> --}}
    <script src="{{ asset('app-assets/js/script.js') }}" rel="preload" as="script"></script>
    @livewireScripts
    @yield('script')
</body>
