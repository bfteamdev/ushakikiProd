@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Sub-categories list
                    <div class="text-muted pt-2 font-size-sm">sub-category</div>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('sub-category.create') }}" class="btn btn-primary font-weight-bolder">Create a new subcategory
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-10">
                        <div class="row align-items-center">
                            <div class="col-lg-12 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold col-lg-12">Search</a>
                    </div>
                </div>
            </div>
            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                <thead>
                    <tr>
                        <th title="Field #2">Name</th>
                        <th title="Field #3">Parent category</th>
                        <th title="Field #5">ACTION</th>
                        {{-- <th title="Field #5">ACTION</th> --}}
                    </tr>
                </thead>
                <tbody>

                    
                   {{-- jjjjjjjjjjjjjjjjjj --}}
                    @foreach ($type as $item)
                        <tr>
                            <td class="pl-0 text-dark-75 font-weight-bolder mb-1 font-size-lg">{{ $item->name }}
                            </td>
                            <td class="pl-0 text-dark-75 font-weight-bolder mb-1 font-size-lg">{{ $item->category->name }}
                            </td>
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('sub-category.edit', ['sub_category' => $item->id]) }}" class="btn btn-primary" style="padding: 8px 10px;">
                                    <i class="flaticon-edit p-0"></i>
                                </a>
                                <form action="{{ route('sub-category.destroy', ['sub_category' => $item->id]) }}" method="post"
                                    style="display: inline-block;">
                                    @method("delete")
                                    @csrf
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
            <!--end: Datatable-->
        </div>
    </div>
@endsection
@section('styles')
    <style>
        .symbol.symbol-50 .symbol-label {
            width: 34px;
            height: 32px;
            background-color: #3699ff;
        }
        thead tr{
            background-color: #e2e2e2;
        }
        tr {
            border-bottom: 1px solid #d1d1d1;
        }
        .datatable-row-detail{
            display: none!important;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
    <script>
        function Delete() {
            this.addEventListener('submit', (e) => {
                if (confirm("Vous voulez supprime cette categorie ???") == true) {
                    return true;
                } else {
                    e.preventDefault();
                }
            });
        }

    </script>
@endsection
