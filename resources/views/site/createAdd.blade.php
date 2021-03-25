@extends('layout.app')
<style>
    .customSVG {
        position: absolute;
        background-color: #ffffff;
        padding: 12px 12px;
        border-radius: 25%;
        box-shadow: 0px 0px 12px 0px #ffffff;
        top: 10px;
    }

    .customSVG i {
        font-size: 27px;
        color: #353535;
    }

    .action {
        position: absolute;
        right: 10px;
        top: 10px;
        padding: 10px;
        box-shadow: 0px 0px 0 4px white;
        border-radius: 1.25rem;
    }

    .action a {
        margin-left: 10px;
        border-radius: 50%;
        background-color: #0063f8 !important;
        box-shadow: 0px 0px 10px 0px #5a5a5a;
    }

    .action form button {
        border-radius: 50%;
        background-color: red !important;
        box-shadow: 0px 0px 10px 0px #5a5a5a;
    }

    .iconStyle {
        padding: 4px 5px;
        font-size: 12px !important;
        color: white !important;
    }

</style>
@section('content')
    {{-- <div class="card card-custom p-4 col-xl-8 mx-auto"> --}}
    {{-- <div class="card-header flex-wrap border-0 pt-6 pb-0 mb-8"> --}}


    {{-- </div> --}}

    <div class="text-center">
      <h3>Déposer une annonce
          {{-- <div class="text-muted pt-2 font-size-sm">Group</div> --}}
      </h3>
  </div>
    {{-- <div class="card card-custom bg-gray-100 gutter-b card-stretch"> --}}
    {{-- <div class="card-body p-0 position-relative overflow-hidden"> --}}
    <div class="col-xl-10 mx-auto">
        <div class="card my-3">
            <div class="card-title my-2 px-2">
                <h3>choisir la categorie
                    {{-- <div class="text-muted pt-2 font-size-sm">Group</div> --}}
                </h3>
            </div>
            <div class="card-body">
                <div class="row m-0 justify-content-center align-items-center">
                    @foreach ($cat as $item)

                        <div class="col-lg-2 px-6 py-8 my-3  mx-3  mb-7 shadow p-3 mb-5 bg-light rounded" >
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2 customSVG">
                                <i class="{{ $item->icon }}"></i>
                            </span>
                            <div class="d-flex justify-content-between" style="margin-top: 50px;">
                                {{-- <span class="text-light font-weight-bold font-size-h6">{{ $item->name }}</span> --}}
                                <!-- Button trigger modal-->
                                <button type="button" class="btn btn-primary " 
                                    style="color: #000000; background-color: #116fce00; border-color: #3699ff00; padding: 0;">
                                    {{ $item->name }}</button>
                                <!-- Modal-->

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- </div> --}}

            <!--end::Stats-->
            {{-- <div class="resize-triggers">
            <div class="expand-trigger">
                <div style="width: 414px; height: 447px;"></div>
            </div>
            <div class="contract-trigger"></div>
        </div> --}}
            {{-- </div> --}}
            <!--end::Body-->
            {{-- </div> --}}
            <!--end::Mixed Widget 2-->
            {{-- </div> --}}
        </div>
    </div>
@endsection
