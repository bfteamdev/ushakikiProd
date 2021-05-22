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
                <div class="d-flex flex-row my-5">
                    @include('site.dashbaord.sidebar')
                    <div class="flex-row-fluid col-lg-12">
                        <div class="card card-custom">
                            <div class="card-body">
                                <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                                    <!--begin::Card-->
                                    <div class="card card-custom">
                                        <!--begin::Header-->
                                        <div class="card-header align-items-center px-4 py-3">                                          
                                            <div class="text-center flex-grow-1">
                                                <div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
                                                <div>
                                                    <span class="label label-sm label-dot label-success"></span>
                                                    <span class="font-weight-bold text-muted font-size-sm">Active</span>
                                                </div>
                                            </div>                      
                                        </div>
                                        <!--end::Header-->

                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Scroll-->
                                            <div class="scroll scroll-pull ps ps--active-y" data-mobile-height="350"
                                                style="height: 54px; overflow: hidden;">
                                                <!--begin::Messages-->
                                                <div class="messages">
                                                    <!--begin::Message In-->
                                                    <div class="d-flex flex-column mb-5 align-items-start">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                                <img alt="Pic" src="{{ asset('media/users/300_12.jpg') }}">
                                                            </div>
                                                            <div>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                                    Pears</a>
                                                                <span class="text-muted font-size-sm">2 Hours</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                            How likely are you to recommend our company
                                                            to your friends and family?
                                                        </div>
                                                    </div>
                                                    <!--end::Message In-->

                                                    <!--begin::Message Out-->
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <span class="text-muted font-size-sm">3 minutes</span>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                            </div>
                                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                                <img alt="Pic" src="{{ asset('media/users/300_21.jpg') }}">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            Hey there, we’re just writing to let you know
                                                            that you’ve been subscribed to a repository on GitHub.
                                                        </div>
                                                    </div>
                                                    <!--end::Message Out-->

                                                    <!--begin::Message In-->
                                                    <div class="d-flex flex-column mb-5 align-items-start">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                                <img alt="Pic" src="assets/media/users/300_21.jpg">
                                                            </div>
                                                            <div>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                                    Pears</a>
                                                                <span class="text-muted font-size-sm">40 seconds</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                            Ok, Understood!
                                                        </div>
                                                    </div>
                                                    <!--end::Message In-->

                                                    <!--begin::Message Out-->
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <span class="text-muted font-size-sm">Just now</span>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                            </div>
                                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                                <img alt="Pic" src="assets/media/users/300_21.jpg">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            You’ll receive notifications for all issues, pull requests!
                                                        </div>
                                                    </div>
                                                    <!--end::Message Out-->

                                                    <!--begin::Message In-->
                                                    <div class="d-flex flex-column mb-5 align-items-start">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                                <img alt="Pic" src="assets/media/users/300_12.jpg">
                                                            </div>
                                                            <div>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                                    Pears</a>
                                                                <span class="text-muted font-size-sm">40 seconds</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                            You can unwatch this repository immediately by clicking here: <a
                                                                href="#">https://github.com</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Message In-->

                                                    <!--begin::Message Out-->
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <span class="text-muted font-size-sm">Just now</span>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                            </div>
                                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                                <img alt="Pic" src="assets/media/users/300_21.jpg">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            Discover what students who viewed Learn Figma - UI/UX Design.
                                                            Essential Training also viewed
                                                        </div>
                                                    </div>
                                                    <!--end::Message Out-->

                                                    <!--begin::Message In-->
                                                    <div class="d-flex flex-column mb-5 align-items-start">
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                                <img alt="Pic" src="assets/media/users/300_12.jpg">
                                                            </div>
                                                            <div>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt
                                                                    Pears</a>
                                                                <span class="text-muted font-size-sm">40 seconds</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                            Most purchased Business courses during this sale!
                                                        </div>
                                                    </div>
                                                    <!--end::Message In-->

                                                    <!--begin::Message Out-->
                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <span class="text-muted font-size-sm">Just now</span>
                                                                <a href="#"
                                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                            </div>
                                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                                <img alt="Pic" src="assets/media/users/300_21.jpg">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                            Company BBQ to celebrate the last quater achievements and goals.
                                                            Food and drinks provided
                                                        </div>
                                                    </div>
                                                    <!--end::Message Out-->
                                                </div>
                                                <!--end::Messages-->
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                                    </div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; height: 54px; right: -2px;">
                                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Scroll-->
                                        </div>
                                        <!--end::Body-->
                                        <!--begin::Footer-->
                                        <div class="card-footer align-items-center">
                                            <!--begin::Compose-->
                                            <textarea class="form-control border-0 p-0" rows="2"
                                                placeholder="Type a message"></textarea>
                                            <div class="d-flex align-items-center justify-content-between mt-5">
                                                <div class="mr-3">
                                                    <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i
                                                            class="flaticon2-photograph icon-lg"></i></a>
                                                    <a href="#" class="btn btn-clean btn-icon btn-md"><i
                                                            class="flaticon2-photo-camera  icon-lg"></i></a>
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                                                </div>
                                            </div>
                                            <!--begin::Compose-->
                                        </div>
                                        <!--end::Footer-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                        </div>
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
