@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel"
                    aria-labelledby="kt_tab_pane_1_4">
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->
                        <form method="GET" action="{{ route('order.search') }}">
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
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 pr-0">
                                    {{-- <label for="">client</label> --}}
                                    <input type="text" class="form-control" placeholder="search by client" name="user"
                                        value="{{ old('user') }}">
                                </div>
                                <div class="col-lg-2 pr-0">
                                    <input type="text" class="form-control" placeholder="search by price" name="price"
                                        value="{{ old('price') }}">
                                </div>
                                <div class="col-lg-2">
                                    {{-- <label></label> --}}
                                    <div class="input-icon">
                                        <button class="btn btn-success col-lg-10" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Search Form-->
                        <!--end: Search Form-->

                        <!--begin: Datatable-->
                        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-subtable datatable-loaded"
                            id="kt_datatable" style="">
                            @if (sizeof($search) != null)
                                <table class="datatable-table" style="display: block;">
                                    <thead class="datatable-head">
                                        <tr class="datatable-row">
                                            <th data-field="RecordID"
                                                class="datatable-cell-center datatable-cell datatable-cell-sort"><span
                                                    style="width: 30px;"></span></th>
                                            <th data-field="FirstName" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">OrderReference</span></th>
                                            <th data-field="LastName" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">Title</span></th>
                                            <th data-field="Company" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">Client</span></th>
                                            <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">Categories</span></th>
                                            <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">Prix</span></th>
                                            {{-- <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                                style="width: 137px;">create_at</span></th>
                                    <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">Expled_at</span></th> --}}
                                            <th data-field="Status" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">Status</span></th>
                                            <th data-field="action" class="datatable-cell datatable-cell-sort"><span
                                                    style="width: 137px;">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody class="datatable-body" style="">

                                        @foreach ($search as $item)
                                            <tr data-row="0" class="datatable-row datatable-row-even">
                                                <td class="datatable-cell-sorted datatable-cell-center datatable-cell"
                                                    data-field="RecordID" aria-label="1"><a
                                                        class="datatable-toggle-subtable" href="#" data-value="1"
                                                        title="Load sub table" style="width: 30px;"><i style="width: 30px;"
                                                            class="fa fa-caret-right"></i></a></td>
                                                <td data-field="FirstName" aria-label="Tommie" class="datatable-cell"><span
                                                        style="width: 137px;">{{ $item->orderReference }}</span></td>
                                                <td data-field="LastName" aria-label="Pee" class="datatable-cell"><span
                                                        style="width: 137px;">{{ $item->title }}</span></td>
                                                <td data-field="LastName" aria-label="Pee" class="datatable-cell"><span
                                                        style="width: 137px;">{{ $item->firstName }}
                                                        {{ $item->lastName }}</span></td>
                                                @if ($item->category_id != null)
                                                    <td data-field="Company" aria-label="Roodel" class="datatable-cell">
                                                        <span
                                                            style="width: 137px;">{{ $item->annonce->category->name }}</span>
                                                    </td>
                                                @else
                                                    <td data-field="Company" aria-label="Roodel" class="datatable-cell">
                                                        <span style="width: 137px;">{{ $item->annonce->type->name }}</span>
                                                    </td>
                                                @endif
                                                <td data-field="Email" aria-label="tpee0@slashdot.org"
                                                    class="datatable-cell">
                                                    <span style="width: 137px;">{{ $item->annonce->price }} BIF</span>
                                                </td>
                                                {{-- <td data-field="Email" aria-label="tpee0@slashdot.org" class="datatable-cell">
                                                <span style="width: 137px;">{{ $item->annonce->created_at }}</span></td>
                                        <td data-field="Email" aria-label="tpee0@slashdot.org" class="datatable-cell">
                                            <span style="width: 137px;">{{ $item->annonce->expired_at }}</span></td> --}}
                                                @if ($item->status != 'paid')
                                                    <td data-field="Status" aria-label="4" class="datatable-cell"><span
                                                            style="width: 137px;"><span
                                                                class="label  label-danger label-inline label-pill">{{ $item->status }}</span></span>
                                                    </td>
                                                @else
                                                    <td data-field="Status" aria-label="4" class="datatable-cell"><span
                                                            style="width: 137px;"><span
                                                                class="label  label-success label-inline label-pill">{{ $item->status }}</span></span>
                                                    </td>
                                                @endif
                                                <td data-field="Status" aria-label="4" class="datatable-cell"><span
                                                        style="width: 137px;">
                                                        <a href="{{ route('order.show',['order'=>$item->id]) }}"><span
                                                                class="label  label-success label-inline label-pill">view more</span></a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                            <div class="mt-3">
                            <span class="h3"> Aucune commande correspond a votre recherche</span>
                            </div>
                            @endif

                        </div>
                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
