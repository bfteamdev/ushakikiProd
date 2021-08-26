@extends('layout.app')
@section('messageActive') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
@endsection
@section('content')
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
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
                    <div class="row col-lg-8 ml-4 p-0 grayBg" style="height:756px;max-height:756px;">
                        <div id="popupChat" class="popupChat col-lg-12 chatAll">
                            <form id="form" action="{{ route('message.store', ['idReceiver' => $userInfo->id]) }}"
                                method="post" style="height: 100%">
                                @csrf
                                @method("post")
                                <div class="message">
                                    <div class="message-header">
                                        <a href="{{ route('dashboard.message') }}"><i class="ki ki-close icon-1x" id="closePopup"></i></a> 
                                        <span class="name">{{ $userInfo->username }}</span>
                                        <div class="header-profil">
                                            <img src="{{ asset('storage/' . $userInfo->profil) }}" alt="">
                                        </div>
                                    </div>
                                    @livewire('chat', ['receiver_id' => Auth::user()->id,"sender_id"=>$userInfo->id])
                                    <div class="message-footer">
                                        <div class="message-input">
                                            <textarea id="message" name="message"
                                                placeholder="Votre message ....."></textarea>
                                        </div>
                                        <button class="message-send" type="submit">Send<i
                                                class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}" rel="preload" as="script"></script>
    <script src="{{ asset('js/pages/custom/chat/chat.js') }}" rel="preload" as="script"></script>
    <script>
        let scrollBottom = document.querySelector(".message-body")
        scrollBottom.scrollTop = scrollBottom.scrollHeight
    </script>
    <script src="{{ asset('app-assets/js/popup.js') }}" rel="preload" as="script"></script>
@endsection
