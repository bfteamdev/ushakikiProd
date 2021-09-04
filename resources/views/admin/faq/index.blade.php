@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">FAQ List
                    <div class="text-muted pt-2 font-size-sm">FAQ</div>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('faq.create') }}" class="btn btn-primary font-weight-bolder">Create a FAQ </a>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel"
                    aria-labelledby="kt_tab_pane_1_4">
                    <form method="GET" action="http://localhost:8000/admin/ads/voiture_search">

                        <div class="row align-items-center col-lg-12 border-1">
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="search by Qst" name="title" value="">
                            </div>
                            <div class="col-lg-2">
                                <div class="input-icon">
                                    <button class="btn btn-success col-lg-10" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-subtable datatable-loaded"
                            id="kt_datatable" style="">
                            <table class="datatable-table" style="display: block;">
                                <thead class="datatable-head">
                                    <tr class="datatable-row">
                                        <th class="datatable-cell-center datatable-cell datatable-cell-sort"
                                            style="width: 42px;">
                                            <span style="width: 30px;"></span>
                                        </th>
                                        <th class="datatable-cell datatable-cell-sort" style="width: 657px;">Title</th>
                                        <th class="datatable-cell datatable-cell-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="datatable-body" style="">
                                    @foreach ($faq as $item)
                                        <tr data-row="0" class="datatable-row datatable-row-even">
                                            <td class="datatable-cell-sorted datatable-cell-center datatable-cell"
                                                style="width: 42px;">
                                                <a class="datatable-toggle-subtable" href="#" data-value="1"
                                                    title="Load sub table" style="width: 30px;">
                                                    <i style="width: 30px;" class="fa fa-caret-right"></i></a>
                                            </td>
                                            <td aria-label="Tommie" class="datatable-cell"> {{ $item->question }}</td>
                                            <td data-field="Status" aria-label="4" class="datatable-cell d-flex">
                                                <span class="mr-3"><a
                                                        href="{{ route('faq.edit', ['faq' => $item->id]) }}"
                                                        class="btn btn-primary" style="padding: 8px 10px;">
                                                        <i class="flaticon-edit p-0"></i>
                                                    </a>
                                                </span>
                                                <form action="{{ route('faq.destroy', ['faq' => $item->id]) }}"
                                                    method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="btn btn-danger" style="padding: 8px 10px;"
                                                        onclick="Delete()">
                                                        <i class="flaticon2-trash p-0"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
