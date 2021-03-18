@extends('layout.default')
@section('content')
    <div class="card card-custom col-lg-7 mx-auto">
        <div class="card-header">
            <div class="row">

                <h3 class="card-title">Create a new features</h3>

            </div>
        </div>
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('features.store') }}">
            @csrf
            <div class="card-body pb-0">
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="mb">
                    {{-- <h3 class="font-size-lg text-dark-75 font-weight-bold mb-10"></h3> --}}
                    <div class="mb-4 row">
                        <div class="form-group col-lg-7">

                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Sub-category name" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>

                            @enderror
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="exampleSelect1">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Select category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Display order <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('displayOrder') is-invalid @enderror"
                                placeholder="Sub-category name" name="displayOrder" value="{{ old('displayOrder') }}" min="1">
                            @error('displayOrder')
                                <div class="invalid-feedback">{{ $errors->first('displayOrder') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 mb-0">
                            <div id="kt_repeater_1" class="">
                                <div class="form-group row mb-0 mt-3 border border-xl-1 pt-4 pr-4 mb-4" id="kt_repeater_1"
                                    style="margin-bottom: 10px;">
                                    <div data-repeater-list="fields" class="col-lg-12">
                                        <div data-repeater-item="" class="form-group row align-items-center"
                                            style="margin-bottom: 10px;">
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" placeholder="Feature name"
                                                    name="fields[0][name]">
                                                <div class="d-md-none mb-2"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <select class="form-control" name="fields[0][type]">
                                                    <option value="">Type</option>
                                                    <option value="text">Text</option>
                                                    <option value="check">Check</option>
                                                    <option value="number">Number</option>
                                                    <option value="file">File</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:;" data-repeater-delete=""
                                                    class="btn btn-sm font-weight-bolder btn-light-danger">
                                                    <i class="la la-trash-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <a href="javascript:;" data-repeater-create=""
                                            class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>Add feature
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('features.index') }}" class="btn btn-light-dark"><i
                                class="flaticon2-left-arrow-1"></i>Back</a>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2 col-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
@section('scripts')
    <script>
        // Class definition
        var KTFormRepeater = function() {

            // Private functions
            var demo1 = function() {
                $('#kt_repeater_1').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function() {
                        $(this).slideDown();
                    },

                    hide: function(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });

    </script>
@endsection
