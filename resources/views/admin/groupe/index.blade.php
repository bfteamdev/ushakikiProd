@extends('layout.default')
@section('content')
    <div class="card card-custom p-4 col-xl-8 mx-auto">
        <div class="card-header flex-wrap border-0 pt-6 pb-0 mb-8">
            <div class="card-title">
                <h3 class="card-label">Group List
                    <div class="text-muted pt-2 font-size-sm">Group</div>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('group.create') }}" class="btn btn-primary font-weight-bolder">
                    Create a Group
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
                                    style="background-color: {{ $item->color }}"
                                    style="padding-bottom: 2rem !important;margin: 14px 25px !important;">
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2 customSVG">
                                        <i class="{{ $item->icon }}"></i>
                                    </span>
                                    <div class="d-flex justify-content-between" style="margin-top: 60px;">
                                        {{-- <span class="text-light font-weight-bold font-size-h6">{{ $item->name }}</span> --}}
                                        <!-- Button trigger modal-->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalLong{{ $item->id }}"
                                            style="color: #ffffff; background-color: #3699ff00; border-color: #3699ff00; padding: 0;"
                                            {{ !empty($item->categories[0]) ? '' : 'disabled' }}>
                                            {{ $item->name }}
                                        </button>
                                        <!-- Modal-->
                                        <div class="modal fade" id="exampleModalLong{{ $item->id }}"
                                            data-backdrop="static" tabindex="-1" role="dialog"
                                            aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><b>Groupe :
                                                            </b>{{ $item->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('admin.groupe.cateGroup')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="action" style="background-color: {{ $item->color }}">
                                            <form action="{{ route('group.destroy', ['group' => $item->id]) }}"
                                                method="post" style="display: inline-block">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" onclick="Delete()" class="btn p-1"
                                                    style="padding: 0 3px"><i
                                                        class="text-danger fas fa-trash iconStyle"></i></button>
                                            </form>
                                            <a href="{{ route('group.edit', ['group' => $item->id]) }}" class=" btn p-1"
                                                style="padding: 0 3px"><i class="text-success fas fa-pen iconStyle"></i></a>
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
@section('styles')
    <style>
        .customSVG {
            position: absolute;
            background-color: #ffffff;
            padding: 12px 12px;
            border-radius: 25%;
            box-shadow: 0px 0px 12px 0px #ffffff;
            top: 10px;
        }

        .customSVG i {
            font-size: 27px;
            color: #353535;
        }

        .action {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 10px;
            box-shadow: 0px 0px 0 4px white;
            border-radius: 1.25rem;
        }

        .action a {
            margin-left: 10px;
            border-radius: 50%;
            background-color: #0063f8 !important;
            box-shadow: 0px 0px 10px 0px #5a5a5a;
        }

        .action form button {
            border-radius: 50%;
            background-color: red !important;
            box-shadow: 0px 0px 10px 0px #5a5a5a;
        }

        .iconStyle {
            padding: 4px 5px;
            font-size: 12px !important;
            color: white !important;
        }

    </style>
@endsection
@section('scripts')
    <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
    <script>
        function Delete() {
            this.addEventListener('submit', (e) => {
                if (confirm("Do wont delete this group ???") == true) {
                    return true;
                } else {
                    e.preventDefault();
                }
            });
        }

    </script>
@endsection
