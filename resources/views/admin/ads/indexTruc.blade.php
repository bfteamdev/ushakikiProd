@extends('layout.default')
@section('content')
@section('activeTruc') active @endsection
    <div class="card card-custom">
        @include('admin.ads.header')
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel"
                    aria-labelledby="kt_tab_pane_1_4">
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->
                        <div class="mb-7">
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
                                                    <div class="dropdown-menu ">
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
                                                    <div class="dropdown-menu ">
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
                        <!--end::Search Form-->
                        <!--end: Search Form-->

                        <!--begin: Datatable-->
                        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-subtable datatable-loaded"
                            id="kt_datatable" style="">
                            <table class="datatable-table" style="display: block;">
                                <thead class="datatable-head">
                                    <tr class="datatable-row">
                                        <th data-field="RecordID"
                                            class="datatable-cell-center datatable-cell datatable-cell-sort"><span style="width: 30px;"></span></th>
                                        <th data-field="FirstName" class="datatable-cell datatable-cell-sort"><span style="width: 137px;">Title</span></th>
                                        <th data-field="LastName" class="datatable-cell datatable-cell-sort"><span style="width: 137px;">Client</span></th>
                                        <th data-field="Company" class="datatable-cell datatable-cell-sort"><span style="width: 137px;">Category</span></th>
                                        <th data-field="Email" class="datatable-cell datatable-cell-sort"><span style="width: 137px;">Create at</span></th>
                                        <th data-field="Email" class="datatable-cell datatable-cell-sort"><span style="width: 137px;">Expired at</span></th>
                                        <th data-field="Status" class="datatable-cell datatable-cell-sort"><span style="width: 137px;">Status</span></th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body" style="">
                                    <tr data-row="0" class="datatable-row datatable-row-even">
                                        <td class="datatable-cell-sorted datatable-cell-center datatable-cell"
                                            data-field="RecordID" aria-label="1"><a class="datatable-toggle-subtable"
                                                href="#" data-value="1" title="Load sub table" style="width: 30px;"><i
                                                    style="width: 30px;" class="fa fa-caret-right"></i></a></td>
                                        <td data-field="FirstName" aria-label="Tommie" class="datatable-cell"><span
                                                style="width: 137px;">Tommie</span></td>
                                        <td data-field="LastName" aria-label="Pee" class="datatable-cell"><span
                                                style="width: 137px;">Pee</span></td>
                                        <td data-field="Company" aria-label="Roodel" class="datatable-cell"><span
                                                style="width: 137px;">Roodel</span></td>
                                        <td data-field="Email" aria-label="tpee0@slashdot.org" class="datatable-cell"><span
                                                style="width: 137px;">tpee0@slashdot.org</span></td>
                                        <td data-field="Status" aria-label="4" class="datatable-cell"><span
                                                style="width: 137px;"><span
                                                    class="label  label-success label-inline label-pill">Active</span></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
