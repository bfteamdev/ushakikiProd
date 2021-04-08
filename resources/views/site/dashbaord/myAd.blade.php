@extends('layout.app')
@section('style')
    <link href="{{ asset("css/style.bundle.css") }}" rel="stylesheet">
    @endsection
@section('content')

    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->has('error') }}
            </div>
        @endif
        <div class="d-flex flex-row my-5">
            <!--begin::Aside-->
          @include('site.dashbaord.sidebar')
            <!--end::Aside-->

            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom">

                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <h2 class=" text-center">Mes Annonces</h2>
                    </div>
                    <!--end::Header-->
                   <div class="card-body">
                       <table class="table">
                           <tbody>
                               <tr>
                                   <th scope="col">Title</th>
                                   <th scope="col">Date d'enreg</th>
                                   <th scope="col">Date d'échéance</th>
                                   <th scope="col">Status</th>
                                   <th scope="col">Action</th>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>



    </div>
    @endsection
