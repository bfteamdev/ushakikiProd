@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Sub-datatable Demo
                    <span class="d-block text-muted pt-2 font-size-sm">Sub-datatable examples with local datasource</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                        fill="#000000" opacity="0.3"></path>
                                    <path
                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> Export
                    </button>

                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                Choose an option:
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-print"></i></span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-copy"></i></span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->

                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span> New Record
                </a>
                <!--end::Button-->
            </div>
        </div>
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
                                    <div class="dropdown bootstrap-select form-control"><select class="form-control"
                                            id="kt_datatable_search_status">
                                            <option value="">All</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Delivered</option>
                                            <option value="3">Canceled</option>
                                            <option value="4">Success</option>
                                            <option value="5">Info</option>
                                            <option value="6">Danger</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <div class="dropdown bootstrap-select form-control"><select class="form-control"
                                            id="kt_datatable_search_type">
                                            <option value="">All</option>
                                            <option value="1">Online</option>
                                            <option value="2">Retail</option>
                                            <option value="3">Direct</option>
                                        </select>
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
                            <th data-field="FirstName" class="datatable-cell datatable-cell-sort datatable-cell-sorted"
                                data-sort="asc"><span style="width: 137px;">First Name<i
                                        class="flaticon2-arrow-up"></i></span></th>
                            <th data-field="LastName" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 137px;">Last Name</span></th>
                            <th data-field="Company" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 137px;">Company</span></th>
                            <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 137px;">Email</span></th>
                            <th data-field="Status" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 137px;">Status</span></th>
                            <th data-field="Type" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort">
                                <span style="width: 137px;">Type</span>
                            </th>
                            <th data-field="Actions" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 130px;">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="datatable-body" style="">
                        <tr data-row="0" class="datatable-row datatable-row-even">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="190"><a
                                    class="datatable-toggle-subtable" href="#" data-value="190" title="Load sub table"
                                    style="width: 30px;"><i style="width: 30px;" class="fa fa-caret-right"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Audrie">
                                <span style="width: 137px;">Audrie</span>
                            </td>
                            <td data-field="LastName" aria-label="Bosche" class="datatable-cell"><span
                                    style="width: 137px;">Bosche</span></td>
                            <td data-field="Company" aria-label="Shuffletag" class="datatable-cell"><span
                                    style="width: 137px;">Shuffletag</span></td>
                            <td data-field="Email" aria-label="abosche59@lulu.com" class="datatable-cell"><span
                                    style="width: 137px;">abosche59@lulu.com</span></td>
                            <td data-field="Status" aria-label="4" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-success label-inline label-pill">Success</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr class="datatable-row-subtable datatable-row-subtable-even" style="display: none;">
                            <td class="datatable-subtable" colspan="8">
                                <div id="child_data_local_190"
                                    class="datatable datatable-default datatable-primary datatable-scroll datatable-loaded"
                                    style="">
                                    <table class="datatable-table" style="display: block; max-height: 400px;">
                                        <thead class="datatable-head">
                                            <tr class="datatable-row">
                                                <th data-field="OrderID" class="datatable-cell datatable-cell-sort"><span
                                                        style="width: 150px;">Order ID</span></th>
                                                <th data-field="ShipCountry" class="datatable-cell datatable-cell-sort">
                                                    <span style="width: 100px;">Country</span>
                                                </th>
                                                <th data-field="ShipAddress" class="datatable-cell datatable-cell-sort">
                                                    <span style="width: 150px;">Ship Address</span>
                                                </th>
                                                <th data-field="ShipName" class="datatable-cell datatable-cell-sort"><span
                                                        style="width: 150px;">Ship Name</span></th>
                                                <th data-field="TotalPayment" class="datatable-cell datatable-cell-sort">
                                                    <span style="width: 150px;">Payment</span>
                                                </th>
                                                <th data-field="Status" class="datatable-cell datatable-cell-sort"><span
                                                        style="width: 150px;">Status</span></th>
                                                <th data-field="Type" data-autohide-disabled="false"
                                                    class="datatable-cell datatable-cell-sort"><span
                                                        style="width: 150px;">Type</span></th>
                                            </tr>
                                        </thead>
                                        <tbody class="datatable-body ps" style="max-height: 361px;">
                                            <tr data-row="0" class="datatable-row">
                                                <td data-field="OrderID" aria-label="36987-1461" class="datatable-cell">
                                                    <span style="width: 150px;"><span>36987-1461 - PH</span></span>
                                                </td>
                                                <td data-field="ShipCountry" aria-label="PH" class="datatable-cell"><span
                                                        style="width: 100px;">PH</span></td>
                                                <td data-field="ShipAddress" aria-label="42104 Scoville Crossing"
                                                    class="datatable-cell"><span style="width: 150px;">42104 Scoville
                                                        Crossing</span></td>
                                                <td data-field="ShipName" aria-label="Vandervort and Sons"
                                                    class="datatable-cell"><span style="width: 150px;">Vandervort and
                                                        Sons</span></td>
                                                <td data-field="TotalPayment" aria-label="$34955.20" class="datatable-cell">
                                                    <span style="width: 150px;">$34955.20</span>
                                                </td>
                                                <td data-field="Status" aria-label="2" class="datatable-cell"><span
                                                        style="width: 150px;"><span
                                                            class="label  label-light-danger label-inline font-weight-bold label-lg">Delivered</span></span>
                                                </td>
                                                <td data-field="Type" data-autohide-disabled="false" aria-label="2"
                                                    class="datatable-cell"><span style="width: 150px;"><span
                                                            class="label label-primary label-dot mr-2"></span><span
                                                            class="font-weight-bold text-primary">Retail</span></span></td>
                                            </tr>
                                            <tr data-row="1" class="datatable-row datatable-row-even">
                                                <td data-field="OrderID" aria-label="23155-058" class="datatable-cell"><span
                                                        style="width: 150px;"><span>23155-058 - CA</span></span></td>
                                                <td data-field="ShipCountry" aria-label="CA" class="datatable-cell"><span
                                                        style="width: 100px;">CA</span></td>
                                                <td data-field="ShipAddress" aria-label="8713 Barby Park"
                                                    class="datatable-cell"><span style="width: 150px;">8713 Barby
                                                        Park</span></td>
                                                <td data-field="ShipName" aria-label="Wolf, Heller and Goodwin"
                                                    class="datatable-cell"><span style="width: 150px;">Wolf, Heller and
                                                        Goodwin</span></td>
                                                <td data-field="TotalPayment" aria-label="$118568.29"
                                                    class="datatable-cell"><span style="width: 150px;">$118568.29</span>
                                                </td>
                                                <td data-field="Status" aria-label="2" class="datatable-cell"><span
                                                        style="width: 150px;"><span
                                                            class="label  label-light-danger label-inline font-weight-bold label-lg">Delivered</span></span>
                                                </td>
                                                <td data-field="Type" data-autohide-disabled="false" aria-label="3"
                                                    class="datatable-cell"><span style="width: 150px;"><span
                                                            class="label label-success label-dot mr-2"></span><span
                                                            class="font-weight-bold text-success">Direct</span></span></td>
                                            </tr>
                                            <tr data-row="2" class="datatable-row">
                                                <td data-field="OrderID" aria-label="0268-1102" class="datatable-cell"><span
                                                        style="width: 150px;"><span>0268-1102 - GR</span></span></td>
                                                <td data-field="ShipCountry" aria-label="GR" class="datatable-cell"><span
                                                        style="width: 100px;">GR</span></td>
                                                <td data-field="ShipAddress" aria-label="5 Miller Terrace"
                                                    class="datatable-cell"><span style="width: 150px;">5 Miller
                                                        Terrace</span></td>
                                                <td data-field="ShipName" aria-label="Lemke-Prohaska"
                                                    class="datatable-cell"><span style="width: 150px;">Lemke-Prohaska</span>
                                                </td>
                                                <td data-field="TotalPayment" aria-label="$561904.11"
                                                    class="datatable-cell"><span style="width: 150px;">$561904.11</span>
                                                </td>
                                                <td data-field="Status" aria-label="5" class="datatable-cell"><span
                                                        style="width: 150px;"><span
                                                            class="label  label-light-info label-inline font-weight-bold label-lg">Info</span></span>
                                                </td>
                                                <td data-field="Type" data-autohide-disabled="false" aria-label="3"
                                                    class="datatable-cell"><span style="width: 150px;"><span
                                                            class="label label-success label-dot mr-2"></span><span
                                                            class="font-weight-bold text-success">Direct</span></span></td>
                                            </tr>
                                            <tr data-row="3" class="datatable-row datatable-row-even">
                                                <td data-field="OrderID" aria-label="55154-9430" class="datatable-cell">
                                                    <span style="width: 150px;"><span>55154-9430 - BW</span></span>
                                                </td>
                                                <td data-field="ShipCountry" aria-label="BW" class="datatable-cell"><span
                                                        style="width: 100px;">BW</span></td>
                                                <td data-field="ShipAddress" aria-label="9279 Karstens Court"
                                                    class="datatable-cell"><span style="width: 150px;">9279 Karstens
                                                        Court</span></td>
                                                <td data-field="ShipName" aria-label="Hahn-Swaniawski"
                                                    class="datatable-cell"><span
                                                        style="width: 150px;">Hahn-Swaniawski</span></td>
                                                <td data-field="TotalPayment" aria-label="$791445.27"
                                                    class="datatable-cell"><span style="width: 150px;">$791445.27</span>
                                                </td>
                                                <td data-field="Status" aria-label="1" class="datatable-cell"><span
                                                        style="width: 150px;"><span
                                                            class="label label-light-primary label-inline font-weight-bold label-lg">Pending</span></span>
                                                </td>
                                                <td data-field="Type" data-autohide-disabled="false" aria-label="3"
                                                    class="datatable-cell"><span style="width: 150px;"><span
                                                            class="label label-success label-dot mr-2"></span><span
                                                            class="font-weight-bold text-success">Direct</span></span></td>
                                            </tr>
                                            <tr data-row="4" class="datatable-row">
                                                <td data-field="OrderID" aria-label="65862-107" class="datatable-cell"><span
                                                        style="width: 150px;"><span>65862-107 - PH</span></span></td>
                                                <td data-field="ShipCountry" aria-label="PH" class="datatable-cell"><span
                                                        style="width: 100px;">PH</span></td>
                                                <td data-field="ShipAddress" aria-label="99366 Corscot Crossing"
                                                    class="datatable-cell"><span style="width: 150px;">99366 Corscot
                                                        Crossing</span></td>
                                                <td data-field="ShipName" aria-label="D'Amore Inc" class="datatable-cell">
                                                    <span style="width: 150px;">D'Amore Inc</span>
                                                </td>
                                                <td data-field="TotalPayment" aria-label="$569014.73"
                                                    class="datatable-cell"><span style="width: 150px;">$569014.73</span>
                                                </td>
                                                <td data-field="Status" aria-label="2" class="datatable-cell"><span
                                                        style="width: 150px;"><span
                                                            class="label  label-light-danger label-inline font-weight-bold label-lg">Delivered</span></span>
                                                </td>
                                                <td data-field="Type" data-autohide-disabled="false" aria-label="3"
                                                    class="datatable-cell"><span style="width: 150px;"><span
                                                            class="label label-success label-dot mr-2"></span><span
                                                            class="font-weight-bold text-success">Direct</span></span></td>
                                            </tr>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </tbody>
                                    </table>
                                    <div class="datatable-pager datatable-paging-loaded">
                                        <ul class="datatable-pager-nav mb-5 mb-sm-0">
                                            <li><a title="First"
                                                    class="datatable-pager-link datatable-pager-link-first datatable-pager-link-disabled"
                                                    data-page="1" disabled="disabled"><i
                                                        class="flaticon2-fast-back"></i></a></li>
                                            <li><a title="Previous"
                                                    class="datatable-pager-link datatable-pager-link-prev datatable-pager-link-disabled"
                                                    data-page="1" disabled="disabled"><i class="flaticon2-back"></i></a>
                                            </li>
                                            <li style=""></li>
                                            <li style="display: none;"><input type="text"
                                                    class="datatable-pager-input form-control" title="Page number"></li>
                                            <li><a class="datatable-pager-link datatable-pager-link-number datatable-pager-link-active"
                                                    data-page="1" title="1">1</a></li>
                                            <li style=""></li>
                                            <li><a title="Next"
                                                    class="datatable-pager-link datatable-pager-link-next datatable-pager-link-disabled"
                                                    data-page="1" disabled="disabled"><i class="flaticon2-next"></i></a>
                                            </li>
                                            <li><a title="Last"
                                                    class="datatable-pager-link datatable-pager-link-last datatable-pager-link-disabled"
                                                    data-page="1" disabled="disabled"><i
                                                        class="flaticon2-fast-next"></i></a></li>
                                        </ul>
                                        <div class="datatable-pager-info">
                                            <div class="dropdown bootstrap-select datatable-pager-size"
                                                style="width: 60px;"><select class="selectpicker datatable-pager-size"
                                                    title="Select page size" data-width="60px" data-container="body"
                                                    data-selected="5">
                                                    <option class="bs-title-option" value=""></option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select><button type="button" tabindex="-1"
                                                    class="btn dropdown-toggle btn-light" data-toggle="dropdown"
                                                    role="combobox" aria-owns="bs-select-7" aria-haspopup="listbox"
                                                    aria-expanded="false" title="Select page size">
                                                    <div class="filter-option">
                                                        <div class="filter-option-inner">
                                                            <div class="filter-option-inner-inner">5</div>
                                                        </div>
                                                    </div>
                                                </button>
                                                <div class="dropdown-menu ">
                                                    <div class="inner show" role="listbox" id="bs-select-7" tabindex="-1">
                                                        <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                    </div>
                                                </div>
                                            </div><span class="datatable-pager-detail">Showing 1 - 5 of 5</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr data-row="1" class="datatable-row">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="346"><a
                                    class="datatable-toggle-subtable" href="#" data-value="346" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Aura"><span
                                    style="width: 137px;">Aura</span></td>
                            <td data-field="LastName" aria-label="Pentin" class="datatable-cell"><span
                                    style="width: 137px;">Pentin</span></td>
                            <td data-field="Company" aria-label="Abata" class="datatable-cell"><span
                                    style="width: 137px;">Abata</span></td>
                            <td data-field="Email" aria-label="apentin9l@eventbrite.com" class="datatable-cell"><span
                                    style="width: 137px;">apentin9l@eventbrite.com</span></td>
                            <td data-field="Status" aria-label="3" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-primary label-inline label-pill">Canceled</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="2" class="datatable-row datatable-row-even">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="206"><a
                                    class="datatable-toggle-subtable" href="#" data-value="206" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Aurelia">
                                <span style="width: 137px;">Aurelia</span>
                            </td>
                            <td data-field="LastName" aria-label="Cowan" class="datatable-cell"><span
                                    style="width: 137px;">Cowan</span></td>
                            <td data-field="Company" aria-label="Devify" class="datatable-cell"><span
                                    style="width: 137px;">Devify</span></td>
                            <td data-field="Email" aria-label="acowan5p@myspace.com" class="datatable-cell"><span
                                    style="width: 137px;">acowan5p@myspace.com</span></td>
                            <td data-field="Status" aria-label="4" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-success label-inline label-pill">Success</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="3" class="datatable-row">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="348"><a
                                    class="datatable-toggle-subtable" href="#" data-value="348" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Ave"><span
                                    style="width: 137px;">Ave</span></td>
                            <td data-field="LastName" aria-label="McEntagart" class="datatable-cell"><span
                                    style="width: 137px;">McEntagart</span></td>
                            <td data-field="Company" aria-label="Podcat" class="datatable-cell"><span
                                    style="width: 137px;">Podcat</span></td>
                            <td data-field="Email" aria-label="amcentagart9n@homestead.com" class="datatable-cell"><span
                                    style="width: 137px;">amcentagart9n@homestead.com</span></td>
                            <td data-field="Status" aria-label="3" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-primary label-inline label-pill">Canceled</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="4" class="datatable-row datatable-row-even">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="124"><a
                                    class="datatable-toggle-subtable" href="#" data-value="124" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Avie"><span
                                    style="width: 137px;">Avie</span></td>
                            <td data-field="LastName" aria-label="Beric" class="datatable-cell"><span
                                    style="width: 137px;">Beric</span></td>
                            <td data-field="Company" aria-label="Viva" class="datatable-cell"><span
                                    style="width: 137px;">Viva</span></td>
                            <td data-field="Email" aria-label="aberic3f@google.com" class="datatable-cell"><span
                                    style="width: 137px;">aberic3f@google.com</span></td>
                            <td data-field="Status" aria-label="4" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-success label-inline label-pill">Success</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="5" class="datatable-row">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="321"><a
                                    class="datatable-toggle-subtable" href="#" data-value="321" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Axe"><span
                                    style="width: 137px;">Axe</span></td>
                            <td data-field="LastName" aria-label="Loudyan" class="datatable-cell"><span
                                    style="width: 137px;">Loudyan</span></td>
                            <td data-field="Company" aria-label="Dynabox" class="datatable-cell"><span
                                    style="width: 137px;">Dynabox</span></td>
                            <td data-field="Email" aria-label="aloudyan8w@narod.ru" class="datatable-cell"><span
                                    style="width: 137px;">aloudyan8w@narod.ru</span></td>
                            <td data-field="Status" aria-label="1" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label label-primary label-inline label-pill">Pending</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="1" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-danger label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-danger">Online</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="6" class="datatable-row datatable-row-even">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="217"><a
                                    class="datatable-toggle-subtable" href="#" data-value="217" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Bailey">
                                <span style="width: 137px;">Bailey</span>
                            </td>
                            <td data-field="LastName" aria-label="Sloane" class="datatable-cell"><span
                                    style="width: 137px;">Sloane</span></td>
                            <td data-field="Company" aria-label="Dynabox" class="datatable-cell"><span
                                    style="width: 137px;">Dynabox</span></td>
                            <td data-field="Email" aria-label="bsloane60@weather.com" class="datatable-cell"><span
                                    style="width: 137px;">bsloane60@weather.com</span></td>
                            <td data-field="Status" aria-label="1" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label label-primary label-inline label-pill">Pending</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="2" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-primary label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-primary">Retail</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="7" class="datatable-row">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="14"><a
                                    class="datatable-toggle-subtable" href="#" data-value="14" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Baillie">
                                <span style="width: 137px;">Baillie</span>
                            </td>
                            <td data-field="LastName" aria-label="Gullyes" class="datatable-cell"><span
                                    style="width: 137px;">Gullyes</span></td>
                            <td data-field="Company" aria-label="Skinder" class="datatable-cell"><span
                                    style="width: 137px;">Skinder</span></td>
                            <td data-field="Email" aria-label="bgullyesd@army.mil" class="datatable-cell"><span
                                    style="width: 137px;">bgullyesd@army.mil</span></td>
                            <td data-field="Status" aria-label="4" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-success label-inline label-pill">Success</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="8" class="datatable-row datatable-row-even">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="347"><a
                                    class="datatable-toggle-subtable" href="#" data-value="347" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Bambi"><span
                                    style="width: 137px;">Bambi</span></td>
                            <td data-field="LastName" aria-label="Overil" class="datatable-cell"><span
                                    style="width: 137px;">Overil</span></td>
                            <td data-field="Company" aria-label="Jabbersphere" class="datatable-cell"><span
                                    style="width: 137px;">Jabbersphere</span></td>
                            <td data-field="Email" aria-label="boveril9m@flickr.com" class="datatable-cell"><span
                                    style="width: 137px;">boveril9m@flickr.com</span></td>
                            <td data-field="Status" aria-label="6" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-danger label-inline label-pill">Danger</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                        <tr data-row="9" class="datatable-row">
                            <td class="datatable-cell-center datatable-cell" data-field="RecordID" aria-label="36"><a
                                    class="datatable-toggle-subtable" href="#" data-value="36" title="Load sub table"
                                    style="width: 30px;"><i class="fa fa-caret-right" style="width: 30px;"></i></a></td>
                            <td class="datatable-cell-sorted datatable-cell" data-field="FirstName" aria-label="Barclay">
                                <span style="width: 137px;">Barclay</span>
                            </td>
                            <td data-field="LastName" aria-label="Fern" class="datatable-cell"><span
                                    style="width: 137px;">Fern</span></td>
                            <td data-field="Company" aria-label="Demizz" class="datatable-cell"><span
                                    style="width: 137px;">Demizz</span></td>
                            <td data-field="Email" aria-label="bfernz@cloudflare.com" class="datatable-cell"><span
                                    style="width: 137px;">bfernz@cloudflare.com</span></td>
                            <td data-field="Status" aria-label="6" class="datatable-cell"><span style="width: 137px;"><span
                                        class="label  label-danger label-inline label-pill">Danger</span></span></td>
                            <td data-field="Type" data-autohide-disabled="false" aria-label="3" class="datatable-cell"><span
                                    style="width: 137px;"><span class="label label-success label-dot"></span>&nbsp;<span
                                        class="font-weight-bold text-success">Direct</span></span></td>
                            <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                    style="overflow: visible; position: relative; width: 130px;">
                                    <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                            class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg> </span> </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li
                                                    class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action: </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-print"></i></span> <span
                                                            class="navi-text">Print</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-copy"></i></span> <span
                                                            class="navi-text">Copy</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                        <span class="navi-text">Excel</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-text-o"></i></span> <span
                                                            class="navi-text">CSV</span> </a> </li>
                                                <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                            class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                            class="navi-text">PDF</span> </a> </li>
                                            </ul>
                                        </div>
                                    </div> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                    </path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                        rx="1"></rect>
                                                </g>
                                            </svg> </span> </a> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete"> <span class="svg-icon svg-icon-md"> <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg> </span> </a>
                                </span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="datatable-pager datatable-paging-loaded">
                    <ul class="datatable-pager-nav mb-5 mb-sm-0">
                        <li><a title="First" class="datatable-pager-link datatable-pager-link-first" data-page="1"><i
                                    class="flaticon2-fast-back"></i></a></li>
                        <li><a title="Previous" class="datatable-pager-link datatable-pager-link-prev" data-page="2"><i
                                    class="flaticon2-back"></i></a></li>
                        <li style=""></li>
                        <li style="display: none;"><input type="text" class="datatable-pager-input form-control"
                                title="Page number"></li>
                        <li><a class="datatable-pager-link datatable-pager-link-number" data-page="1" title="1">1</a></li>
                        <li><a class="datatable-pager-link datatable-pager-link-number" data-page="2" title="2">2</a></li>
                        <li><a class="datatable-pager-link datatable-pager-link-number datatable-pager-link-active"
                                data-page="3" title="3">3</a></li>
                        <li><a class="datatable-pager-link datatable-pager-link-number" data-page="4" title="4">4</a></li>
                        <li><a class="datatable-pager-link datatable-pager-link-number" data-page="5" title="5">5</a></li>
                        <li></li>
                        <li><a title="Next" class="datatable-pager-link datatable-pager-link-next" data-page="4"><i
                                    class="flaticon2-next"></i></a></li>
                        <li><a title="Last" class="datatable-pager-link datatable-pager-link-last" data-page="35"><i
                                    class="flaticon2-fast-next"></i></a></li>
                    </ul>
                    <div class="datatable-pager-info">
                        <div class="dropdown bootstrap-select datatable-pager-size" style="width: 60px;"><select
                                class="selectpicker datatable-pager-size" title="Select page size" data-width="60px"
                                data-container="body" data-selected="10">
                                <option class="bs-title-option" value=""></option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light"
                                data-toggle="dropdown" role="combobox" aria-owns="bs-select-6" aria-haspopup="listbox"
                                aria-expanded="false" title="Select page size">
                                <div class="filter-option">
                                    <div class="filter-option-inner">
                                        <div class="filter-option-inner-inner">10</div>
                                    </div>
                                </div>
                            </button>
                            <div class="dropdown-menu ">
                                <div class="inner show" role="listbox" id="bs-select-6" tabindex="-1">
                                    <ul class="dropdown-menu inner show" role="presentation"></ul>
                                </div>
                            </div>
                        </div><span class="datatable-pager-detail">Showing 21 - 30 of 350</span>
                    </div>
                </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
@endsection

@section('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/pages/crud/ktdatatable/child/data-local.js') }}" type="text/javascript"></script>
    <!--end::Page Scripts-->
@endsection
