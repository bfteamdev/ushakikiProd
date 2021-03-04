@extends('layout.default')
@section('content')
    <div class="card card-custom p-4 col-xl-8 mx-auto">
        <div class="card-header flex-wrap border-0 pt-6 pb-0 mb-8">
            <div class="card-title">
                <h3 class="card-label">
                    Groupe
                    <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('group.create') }}" class="btn btn-primary font-weight-bolder">
                    Creer un groupe
                </a>
                <!--end::Button-->
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="col-xl-10 mx-auto">
            <div class="card card-custom bg-gray-100 gutter-b card-stretch">
                <div class="card-body p-0 position-relative overflow-hidden">
                    <div class="card-spacer">
                        <div class="row m-0 justify-content-center align-items-center">
                            @foreach ($groupe as $item)
                                <div class="col-lg-5 px-6 py-8 rounded-xl mx-3  mb-7"
                                    style="background-color: {{ $item->color }}">
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                        <img src="{{ asset("$item->icon") }}" />
                                    </span>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-light font-weight-bold font-size-h6">{{ $item->name }}</span>
                                        <div class="">
                                            <form action="{{ route('group.destroy', ['group' => $item->id]) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" onclick="Delete()"
                                                    class="btn bg-light p-1" style="padding: 0 3px"><i
                                                        class="text-danger flaticon2-trash"
                                                        style="padding: 0 3px;font-size: 14px;"></i></button>
                                            </form>
                                            <a href="{{ route('group.edit', ['group' => $item->id]) }}"" class="btn bg-light p-1" style="padding: 0 3px"><i
                                                    class="text-success flaticon-edit"
                                                    style="padding: 0 3px;font-size: 14px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--end::Stats-->
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 414px; height: 447px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
    <script>
        function Delete() {
            this.addEventListener('submit', (e) => {
                if (confirm("Do wont ???") == true) {
                    return true;
                } else {
                    e.preventDefault();
                }
            });
        }
    </script>
@endsection
