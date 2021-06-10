@extends('layout.app')
@section('adsActive') active @endsection
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
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->has('error') }}
                    </div>
                @endif
                <div class="d-flex flex-row my-5">
                    @include('site.dashbaord.sidebar')
                    <div class="flex-row-fluid col-lg-12">
                        <div class="card card-custom">
                            <div class="card-header py-3">
                                <h2 class=" text-center">Mes Annonces</h2>
                            </div>
                            <div class="card-body">
                                @if (sizeof($ad) != null)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Date d'enreg</th>
                                            <th scope="col">Date d'échéance</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ad as $item)
                                            <tr>

                                                <td><img src="{{ asset('storage/' . $item->viewPhoto->name) }}"
                                                        style="width: 165px; height: 100px;  display: block; object-fit:cover;" title=""
                                                        alt="" /></td>
                                                <td style="font-size: 14px;">{{ $item->title }}</td>
                                                <td style="font-size: 14px;">{{ $item->created_at }}</td>
                                                <td style="font-size: 14px;">{{ $item->expired_at }}</td>
                                                <td style="font-size: 14px;"><span
                                                        class="badge badge-{{ $item->statu === 'active' ? 'success' : 'danger' }}">{{ $item->statu }}</span>
                                                </td>
                                                <td style="font-size: 14px;" class="d-flex">
                                                    {{-- <a href="{{ route('ssl.edit',['ssl'=>$item->id]) }}" class="badge badge-info"> view more </a> --}}
                                                    <a href="{{ route('dashboard.ads.show', ['id' => $item->id]) }}"
                                                        class="btn" style="padding: 0; padding: 0 7px;">
                                                        <i class="icon-lg text-dark ml-3 far fa-eye "></i>
                                                    </a> |
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn"
                                                            style="padding: 0; padding: 0 7px;"
                                                            onclick="return(confirm('do you want to delete this Ad??'))">
                                                            <i class="flaticon2-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    
                                @else
                                    <span class="h3">Vous n'avez aucun annonce commence maintenant</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset("js/pages/widgets.js") }}"></script>
 <script src="{{ asset("js/pages/custom/profile/profile.js") }}"></script>
@endsection