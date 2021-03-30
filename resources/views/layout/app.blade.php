<!DOCTYPE html>
<html>

<head>

{{-- <title>ushakiki</title> --}}
@yield('title')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

   
    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap-select.css') }}">
    <link href="{{ asset('app-assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('app-assets/css/flexslider.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('app-assets/css/font-awesome.min.css') }}" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //for-mobile-apps -->
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- js -->
    {{-- Global Theme Styles (used by all pages) --}}
    @foreach (config('layout.resourcesUSHAKIKI.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}"
            rel="stylesheet" type="text/css" />
    @endforeach
    <script type="text/javascript" src="{{ asset('app-assets/js/jquery.min.js') }}"></script>
    <!-- js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('app-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ 'app-assets/js/bootstrap-select.js' }}"></script>
    <script>
        $(document).ready(function() {
            var mySelect = $('#first-disabled2');

            $('#special').on('click', function() {
                mySelect.find('option:selected').prop('disabled', true);
                mySelect.selectpicker('refresh');
            });

            $('#special2').on('click', function() {
                mySelect.find('option:disabled').prop('disabled', false);
                mySelect.selectpicker('refresh');
            });

            $('#basic2').selectpicker({
                liveSearch: true,
                maxOptions: 1
            });
        });

    </script>
    <script type="text/javascript" src="{{ asset('app-assets/js/jquery.leanModal.min.js') }}"></script>
    <link href="{{ asset('app-assets/css/jquery.uls.css') }}" rel="stylesheet" />
    <link href="{{ asset('app-assets/css/jquery.uls.grid.css') }}" rel="stylesheet" />
    <link href="{{ asset('app-assets/css/jquery.uls.lcd.css') }}" rel="stylesheet" />
    <!-- Source -->
    <script src="{{ asset('app-assets/js/jquery.uls.data.js') }}"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.data.utils.js') }}"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.lcd.js') }}"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.languagefilter.js') }}"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.regionfilter.js') }}"></script>
    <script src="{{ asset('app-assets/js/jquery.uls.core.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.uls-trigger').uls({
                onSelect: function(language) {
                    var languageName = $.uls.data.getAutonym(language);
                    $('.uls-trigger').text(languageName);
                },
                quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
            });
        });

    </script>
    @yield('styles')

</head>

<body>
    @include('layout.partials.include.header')
    @yield('content')
    <footer>

      @yield('footer')

    </footer>
    {{-- Global Theme JS Bundle (used by all pages) --}}
    @foreach (config('layout.resourcesUSHAKIKI.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    @yield('script')
</body>