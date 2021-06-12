@extends('layout.app')
@section('messageActive') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
    <style>
        .scrollMin {
            min-height: fit-content;
            overflow: auto;
        }

        .scrollMin::-webkit-scrollbar {
            background-color: #ffffff;
            width: 5px;
        }

        .scrollMin::-webkit-scrollbar-thumb {
            border-radius: 36px;
            background-color: #ffc107;
        }

    </style>
@endsection
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid m-0 pt-0" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                        id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>

                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid ">
            <!--begin::Container-->
            <div class="container">
                <div class="row my-5">
                    @include('website.dashbaord.sidebar')
                    <div class="col-lg-9 p-0 grayBg">
                      @livewire('all-msg')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/pages/custom/chat/chat.js') }}"></script>
@endsection
