@extends('layout.default')
@section('content')
    <div class="d-flex flex-row">
        <!--begin::Aside-->
        <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
            <!--begin::Profile Card-->
            @include('admin.client.leftBar')
            <!--end::Profile Card-->
        </div>
        <!--end::Aside-->
        <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <!--begin::Form-->
            <form class="form" action="{{ route('client.update', ['client' => $client->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("patch")
                <div class="card card-custom card-stretch">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">{{ $client->firstName }}
                                {{ $client->firstName }}</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Informaiton personnel </span>
                        </div>
                        <div class="card-toolbar">
                            <button class="btn btn-danger mr-3 EditPP" type="button" id="EditPP">Edit &nbsp;<i class="fas fa-lock"></i></button>
                            <button type="submit" class="btn btn-primary mr-2 unlockUpdate" disabled>Update &nbsp;<i class="flaticon-refresh"></i></button>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mb-6">Client Info</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Profil</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                    <div class="image-input-wrapper"
                                        style="background-image: url({{ asset('storage/' . $client->profil) }})"></div>
                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profil" accept=".png, .jpg, .jpeg" class="disables" />
                                        <input type="hidden" name="profilremove" class="disables" />
                                    </label>

                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid disables" type="text"
                                    value="{{ $client->firstName }}" disabled name="firstName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid disables" type="text"
                                    value="{{ $client->lastName }}" disabled name="lastName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid disables" type="text"
                                    value="{{ $client->username }}" disabled name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="la la-phone"></i></span></div>
                                    <input type="text" class="form-control form-control-lg form-control-solid disables"
                                        value="{{ $client->phone }}" placeholder="Phone" disabled name="phone">
                                </div>
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="la la-at"></i></span></div>
                                    <input type="text" class="form-control form-control-lg form-control-solid disables"
                                        value="{{ $client->email }}" placeholder="Email" disabled name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Commune</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <input type="text" class="form-control form-control-lg form-control-solid disables"
                                        placeholder="Username" value="{{ $client->town }}" disabled name="town">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Status</label>
                            <div class="col-3">
                                <span class="switch switch-outline switch-icon switch-success">
                                    <label>
                                        <input type="hidden" name="status" value="0" class="disables">
                                        <input type="checkbox" name="status" value="1"
                                            {{ $client->status === 1 ? 'checked' : '' }} class="disables">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <style>
        .switch input:empty~span:before {
            background-color: #f64e60;
        }

    </style>
@endsection

@section('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/pages/widgets.js') }}"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
    <!--end::Page Scripts-->
    <script>
        var avatar3 = new KTImageInput('kt_image_3');
        let edit = document.querySelector(".EditPP")
        let unlockUpdate = document.querySelector(".unlockUpdate")
        let ed = true
        edit.addEventListener("click", (e) => {
            edit.classList.remove("btn-danger")
            edit.classList.add("btn-success")
            unlockUpdate.disabled = false
            edit.children[0].classList.value = "fas fa-lock-open"
            let inputs = document.querySelectorAll(".disables");
            for (let i = 0; i < inputs.length; i++) {
                let input = inputs[i];
                input.disabled = !ed
            }
        })

    </script>
@endsection
