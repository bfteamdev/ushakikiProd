@extends('layout.app')
@section('adsActive') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
    <style>
        .page-link {
            padding: 6px 13px !important;
            font-size: 16px !important;
            border: 2px solid #000000 !important;
        }

        .page-link:hover {
            background-color: #dbac14 !important;
        }

        .page-item.active .page-link {
            background-color: #dbac14 !important;
            border-color: #dbac14 !important;
        }

    </style>
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
                    @include('website.dashbaord.sidebar')
                    <div class="flex-row-fluid col-lg-12">
                        <div class="card card-custom grayBg">
                            <div class="card-header justify-content-between">
                                {{-- <div class="card-title "> --}}
                                <h2 class="card-label mt-5">Mes Annonces</h2>
                                <a href="{{ route('ad.category') }}" class="btn btn-primary mb-5">ajouter un annonce</a>
                                {{-- </div> --}}
                            </div>
                            <div class="mt-2">
                                <form method="GET" action="{{ route('dashboard.ads.search') }}">
                                    <div class="row align-items-center col-lg-12 border-1">
                                        <div class="col-lg-2 pr-0">
                                            <select class="form-control" name="type">
                                                <option value="">Search by</option>
                                                <option value="title">Title</option>
                                                <option value="statu">Status</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 pr-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Search..." name="q">
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="input-icon">
                                                <button class="btn btn-success" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                @if (sizeof($ads) != null)
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
                                            @foreach ($ads as $item)
                                                <tr>
                                                    <td><img src="{{ asset('storage/' . $item->viewPhoto->name) }}"
                                                            style="width: 165px; height: 100px;  display: block; object-fit:contain;"
                                                            title="" alt="" /></td>

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
                                    <div class="d-felx justify-content-center">
                                        {{ $ads->links('pagination::bootstrap-4') }}
                                    </div>
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
    <script src="{{ asset('js/pages/widgets.js') }}"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
@endsection
