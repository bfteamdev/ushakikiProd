@extends('layout.app')

 @section('content')
     
    <div class="text-center">
        <h3>Déposer une annonce
            {{-- <div class="text-muted pt-2 font-size-sm">Group</div> --}}
        </h3>
    </div>
 
    <div class="col-xl-10 mx-auto">
        <div class="card my-3">
            <div class="card-title my-2 px-2">
                <h3>choisir sous categorie
                    {{-- <div class="text-muted pt-2 font-size-sm">Group</div> --}}
                </h3>
            </div>
            <div class="card-body">
                <div class="row m-0 justify-content-center align-items-center">
                    @foreach ($subCat as $item)

                        <div class="col-lg-2 px-6 py-8 my-3  mx-3  mb-7 shadow p-3 mb-5  rounded"
                            style="background-color:#0c6bca00;"
                            style="padding-bottom: 2rem !important;margin: 14px 25px !important;">
                            
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2 customSVG">
                                <i class="{{ $item->icon }}"></i>
                            </span>
                            <div class="d-flex justify-content-between" style="margin-top: 70px;">
                                {{-- <span class="text-light font-weight-bold font-size-h6">{{ $item->name }}</span> --}}
                                <!-- Button trigger modal-->
                                <a href="{{ $item->id }}" class="btn btn-primary "
                                    style="color: #0f0e0e; background-color: #116fce00; border-color: #3699ff00; padding: 0;">
                                    {{ $item->name }}
                                </a>
                                <!-- Modal-->

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 @endsection
 @section('footer')
    @include('layout.partials.include.footer')
@endsection
@section('styles')
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
    </style>
@endsection