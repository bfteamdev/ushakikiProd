@extends('layout.default')
@section('content')
    <link href="{{ asset('css/pages/wizard/wizard-2.css') }}" rel="stylesheet" type="text/css" />
    <div class="card card-custom col-lg-12 mx-auto">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title">
                    Create a new Ads
                </h3>
            </div>
        </div>
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-2" id="kt_wizard_v2" data-wizard-state="last" data-wizard-clickable="false">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
                    <!--begin::Wizard Step 1 Nav-->
                    <div class="wizard-steps">
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="rounded-circle bg-dark text-white" style="padding: 10px 17px !important; font-size: 22px; font-weight: bold;">1</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        Detail de l'annonce
                                    </h3>
                                    <div class="wizard-desc">
                                        Detail de la propriete,prix et contact
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->

                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="rounded-circle bg-dark text-white" style="padding: 10px 17px !important; font-size: 22px; font-weight: bold;">2</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        Images
                                    </h3>
                                    <div class="wizard-desc">
                                        Ajoutes des images (max:5)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->

                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="rounded-circle bg-dark text-white" style="padding: 10px 17px !important; font-size: 22px; font-weight: bold;">3</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        Information supplementaires
                                    </h3>
                                    <div class="wizard-desc">
                                        Information supplementaires
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->

                        <!--begin::Wizard Step 4 Nav-->
                        {{-- <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="rounded-circle bg-dark text-white" style="padding: 10px 17px !important; font-size: 22px; font-weight: bold;">4</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        Publier
                                    </h3>
                                    <div class="wizard-desc">
                                        Placez votre annonce en ligne
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!--end::Wizard Step 4 Nav-->

                        <!--begin::Wizard Step 5 Nav-->
                        {{-- <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Credit-card.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14"
                                                    rx="2">
                                                </rect>
                                                <rect fill="#000000" x="2" y="8" width="20" height="3"></rect>
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2"
                                                    rx="1">
                                                </rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        Make Payment
                                    </h3>
                                    <div class="wizard-desc">
                                        Use Credit or Debit Cards
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 5 Nav--> --}}

                        <!--begin::Wizard Step 6 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="rounded-circle bg-dark text-white" style="padding: 10px 17px !important; font-size: 22px; font-weight: bold;">4</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        Publier
                                    </h3>
                                    <div class="wizard-desc">
                                        Placez votre annonce en ligne
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 6 Nav-->
                    </div>
                </div>
                <!--end: Wizard Nav-->

                <!--begin: Wizard Body-->
                <div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
                    <!--begin: Wizard Form-->
                    <div class="row">
                        <div class="offset-xxl-2 col-xxl-8">
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form">
                                @include('admin.ads.form')
                            </form>
                        </div>
                        <!--end: Wizard-->
                    </div>
                    <!--end: Wizard Form-->
                </div>
                <!--end: Wizard Body-->
            </div>
            <!--end: Wizard-->
        </div>
    </div>
@endsection
@section('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset("js/pages/crud/file-upload/dropzonejs.js") }}"></script>
    <script src="{{ asset('js/pages/custom/wizard/wizard-2.js') }}"></script>
    <!--end::Page Scripts-->
@endsection
