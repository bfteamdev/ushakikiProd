@extends('layout.app')
@section('adsActive') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
@endsection
@section('content')
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->has('error') }}
            </div>
        @endif
        <div class="d-flex flex-row my-5">
            @include('site.dashbaord.sidebar')
            <div class="flex-row-fluid ml-lg-8">
                <div class="card card-custom">
                    <div class="card-header py-3">
                        <h2 class=" text-center">Mes Annonces</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-7 ">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Search..."
                                                    id="kt_datatable_search_query">
                                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                                <div class="dropdown bootstrap-select form-control"><select
                                                        class="form-control" id="kt_datatable_search_status">
                                                        <option value="">All</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Delivered</option>
                                                        <option value="3">Canceled</option>
                                                        <option value="4">Success</option>
                                                        <option value="5">Info</option>
                                                        <option value="6">Danger</option>
                                                    </select><button type="button" tabindex="-1"
                                                        class="btn dropdown-toggle btn-light bs-placeholder"
                                                        data-toggle="dropdown" role="combobox" aria-owns="bs-select-1"
                                                        aria-haspopup="listbox" aria-expanded="false"
                                                        data-id="kt_datatable_search_status" title="All">
                                                        <div class="filter-option">
                                                            <div class="filter-option-inner">
                                                                <div class="filter-option-inner-inner">All</div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <div class="inner show" role="listbox" id="bs-select-1"
                                                            tabindex="-1">
                                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                                <div class="dropdown bootstrap-select form-control"><select
                                                        class="form-control" id="kt_datatable_search_type">
                                                        <option value="">All</option>
                                                        <option value="1">Online</option>
                                                        <option value="2">Retail</option>
                                                        <option value="3">Direct</option>
                                                    </select><button type="button" tabindex="-1"
                                                        class="btn dropdown-toggle btn-light bs-placeholder"
                                                        data-toggle="dropdown" role="combobox" aria-owns="bs-select-2"
                                                        aria-haspopup="listbox" aria-expanded="false"
                                                        data-id="kt_datatable_search_type" title="All">
                                                        <div class="filter-option">
                                                            <div class="filter-option-inner">
                                                                <div class="filter-option-inner-inner">All</div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <div class="inner show" role="listbox" id="bs-select-2"
                                                            tabindex="-1">
                                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                                        Search
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
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
                                        <td style="font-size: 14px;">{{ $item->title }}</td>
                                        <td style="font-size: 14px;">{{ $item->created_at }}</td>
                                        <td style="font-size: 14px;">{{ $item->expired_at }}</td>
                                        <td style="font-size: 14px;"><span class="badge badge-{{ $item->statu === "active" ? "success":"danger" }}">{{ $item->statu }}</span></td>
                                        <td style="font-size: 14px;" class="d-flex">
                                            {{-- <a href="{{ route('ssl.edit',['ssl'=>$item->id]) }}" class="badge badge-info"> view more </a> --}}
                                            <a href="" class="btn" style="padding: 0; padding: 0 7px;">
                                                <i class="icon-lg text-dark ml-3 far fa-eye "></i>
                                            </a> |
                                            <form action="" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn" style="padding: 0; padding: 0 7px;"
                                                    onclick="return(confirm('do you want to delete this Ad??'))">
                                                    <i class="flaticon2-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
