@extends('layout.default')
@section('content')
    @section('activeTruc') active @endsection
    <div class="card card-custom">
        @include('admin.ads.header')
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel"
                    aria-labelledby="kt_tab_pane_1_4">
                    <form method="GET" action="{{ route('ads.truc.search') }}">
                        {{-- @method('get') --}}
                        <div class="row align-items-center col-lg-12 border-1">
                            <div class="col-lg-2">
                                {{-- <label for="">domain</label> --}}
                                <input type="text" class="form-control" placeholder="search by title" name="title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="col-lg-2 pr-0">
                                {{-- <label for="">registry</label> --}}
                                <select name="category" id=""
                                    class="form-control @error('category') is-invalid @enderror">
                                    <option value="">selection la categorie</option>
                                    @foreach ($group as $item)
                                        <optgroup label="{{ $item->name }}">
                                            @foreach ($item->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                                @foreach ($category->type as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                    @endforeach
                                    </optgroup>
                                </select>
                            </div>

                            <div class="col-lg-2 pr-0">
                                {{-- <label for="">status</label> --}}
                                <select class="form-control" name="status">
                                    <option value="">Search by status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-lg-2 pr-0">
                                {{-- <label for="">client</label> --}}
                                <input type="text" class="form-control" placeholder="search by client" name="user"
                                    value="{{ old('user') }}">

                            </div>
                            {{-- <div class="col-lg-2 pr-0">
                                <input type="text" class="form-control" placeholder="startDate(yyyy-mm-dd)" name="created_at"
                                    value="{{ old('created_at') }}">

                            </div> --}}
                            <div class="col-lg-2">
                                {{-- <label></label> --}}
                                <div class="input-icon">
                                    <button class="btn btn-success col-lg-10" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->
                        <!--end::Search Form-->
                        <!--end: Search Form-->
                        <!--begin: Datatable-->
                        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-subtable datatable-loaded"
                            id="kt_datatable" style="">
                            @if (sizeof($searchTruc) != null)
                            <table class="datatable-table" style="display: block;">
                                <thead class="datatable-head">
                                    <tr class="datatable-row">
                                        <th data-field="RecordID"
                                            class="datatable-cell-center datatable-cell datatable-cell-sort"><span
                                                style="width: 30px;"></span></th>
                                        <th data-field="FirstName" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">Title</span></th>
                                        <th data-field="LastName" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">Client</span></th>
                                        <th data-field="Company" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">Category</span></th>
                                        <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">Create at</span></th>
                                        <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">Expired at</span></th>
                                        <th data-field="Status" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">Status</span></th>
                                        <th data-field="action" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body" style="">

                                    @foreach ($searchTruc as $item)
                                        <tr data-row="0" class="datatable-row datatable-row-even">
                                            <td class="datatable-cell-sorted datatable-cell-center datatable-cell"
                                                data-field="RecordID" aria-label="1"><a class="datatable-toggle-subtable"
                                                    href="#" data-value="1" title="Load sub table" style="width: 30px;"><i
                                                        style="width: 30px;" class="fa fa-caret-right"></i></a></td>
                                            <td data-field="FirstName" aria-label="Tommie" class="datatable-cell"><span
                                                    style="width: 137px;">{{ $item->title }}</span></td>
                                            <td data-field="LastName" aria-label="Pee" class="datatable-cell"><span
                                                    style="width: 137px;">{{ $item->username }}</span></td>
                                            <td data-field="Company" aria-label="Roodel" class="datatable-cell"><span
                                                    style="width: 137px;">{{ $item->name }}</span></td>
                                            <td data-field="Email" aria-label="tpee0@slashdot.org" class="datatable-cell">
                                                <span style="width: 137px;">{{ $item->created_at }}</span></td>
                                            <td data-field="Email" aria-label="tpee0@slashdot.org" class="datatable-cell">
                                                <span style="width: 137px;">{{ $item->expired_at }}</span></td>
                                                @if ($item->statu !="active")
                                                <td data-field="Status" aria-label="4" class="datatable-cell"><span
                                                 style="width: 137px;"><span
                                                     class="label  label-danger label-inline label-pill">{{ $item->statu }}</span></span>
                                                 </td>
                                                 @else
                                                 <td data-field="Status" aria-label="4" class="datatable-cell"><span
                                                     style="width: 137px;"><span
                                                         class="label  label-success label-inline label-pill">{{ $item->statu }}</span></span>
                                                 </td>                                                    
                                                @endif
                                            <td data-field="Status" aria-label="4" class="datatable-cell"><span
                                                    style="width: 137px;"><a href="{{ route('ads.truc.show',['id'=>$item->id]) }}"><span
                                                        class="label  label-success label-inline label-pill">view more</span></a></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <span class="h3">Vous n'avez aucun annonce correspond a votre recherche</span>
                            @endif
                        </div>
                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
