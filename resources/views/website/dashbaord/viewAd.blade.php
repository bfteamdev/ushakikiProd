@extends('layout.app')
@section('adsActive') active @endsection
@section('edit') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style" />
    <style>
        .borderImgUnique {
            padding: 5px;
            margin: 0 2px;
            width: 178px;
            border: 2px solid #dbac14;
            border-radius: 8px;
        }

        .borderImg {
            width: 165px;
            height: 100px;
            object-fit: contain;
        }

        .form-group {
            margin-bottom: 6px !important;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css"
        integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA=="
        crossorigin="anonymous" rel="preload" as="style" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"
        integrity="sha512-kZv5Zq4Cj/9aTpjyYFrt7CmyTUlvBday8NGjD9MxJyOY/f2UfRYluKsFzek26XWQaiAp7SZ0ekE7ooL9IYMM2A=="
        crossorigin="anonymous" rel="preload" as="script"></script>
@endsection
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->has('error') }}
                </div>
            @endif
            <div class="d-flex flex-row my-5">
                @include('website.dashbaord.sidebar')
                <div class="flex-row-fluid col-lg-12">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            @include('website.dashbaord.header')<br>
                            {{-- <h2 class=" text-center">Edit Ad</h2> --}}
                        </div>
                        <form action="{{ route('dashboard.ads.update', ['id' => $add->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card-body pt-0">
                                <hr class="my-4">
                                <h3 class="h2">Ad pictures</h3>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="form-group col-lg-12 "
                                        style="overflow: auto;max-height: 235px;padding: 0 !important;display: flex;justify-content: start;align-items: center;">
                                        @foreach ($photo as $item)
                                            <div class="borderImgUnique">
                                                <div class="d-flex align-items-center justify-content-center mb-1 w-100">
                                                    <input type="radio" name="default">
                                                    <span class="font-weight-boldest">&nbsp;set default</span>
                                                </div>
                                                <label for="file{{ $item->id }}">
                                                    <input type="file" accept="image/*"  name="imagesAds[{{ $item->id }}]" class="file"
                                                        id="file{{ $item->id }}" onchange="readURL(this, 'blah');"
                                                        style="display: none;">
                                                    <img id="image{{ $item->id }}"
                                                        src="{{ asset('storage/' . $item->name) }}"
                                                        alt="image-xxxx-xxxx{{ $item->id }}" class="borderImg" />
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('images')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('images') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="my-4">
                                <h3 class="h2">Ad informations</h3>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="">Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ $add->title }}">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">categorie</label>
                                        @if ($add->type_id != null)
                                            <select name="category_id" id=""
                                                class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">selection la categorie</option>
                                                @foreach ($group as $item)
                                                    <optgroup label="{{ $item->name }}">
                                                        @foreach ($item->categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                            @foreach ($category->type as $type)
                                                                <option value="{{ $type->id }}"
                                                                    {{ $type->id === $add->type_id ? 'selected' : '' }}>
                                                                    {{ $type->name }}</option>
                                                            @endforeach

                                                        @endforeach
                                                @endforeach

                                                </optgroup>
                                            </select>
                                        @else
                                            <select name="category_id" id=""
                                                class="form-control @error('category_id')is-invalid @enderror">

                                                <option value="">selection la categorie</option>
                                                @foreach ($group as $item)
                                                    <optgroup label="{{ $item->name }}">
                                                        @foreach ($item->categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ $category->id === $add->category_id ? 'selected' : '' }}>
                                                                {{ $category->name }}</option>
                                                        @endforeach
                                                @endforeach

                                                </optgroup>
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('category_id') }}
                                                </div>
                                            @enderror
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="">Commune</label>
                                        <input type="text" name="commune" class="form-control"
                                            value="{{ $add->commune }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">zone</label>
                                        <input type="text" name="zone" class="form-control" value="{{ $add->zone }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Price</label>
                                        <input type="text" name="price" class="form-control" value="{{ $add->price }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="">Description</label>
                                        <textarea name="description" id="" class="form-control"
                                            rows="5">{{ $add->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label class="col-3 col-form-label">Status</label>
                                        <div class="col-3">
                                            <span class="switch switch-outline switch-icon switch-success">
                                                <label>
                                                    <input type="hidden" name="statu" value="inactive" class="disables">
                                                    <input type="checkbox" name="statu" value="active"
                                                        {{ $add->statu === 'active' ? 'checked' : '' }} class="disables">
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <h3 class="h2">Features</h3>
                                <hr class="my-4">
                                {{-- ........................actuel.......................... --}}
                                <div class="row">
                                    @if (sizeof($features) === 3)
                                        @foreach ($features as $feature)
                                        <div class="form-group col-lg-4">
                                            <label for="">{{ $feature->field->name }}</label>
                                            <input type="{{ $feature->field->type }}"
                                                name="value[{{ $feature->id }}]"
                                                class="form-control @error('value') is-invalid @enderror"
                                                value="{{ $feature->value }}">
                                            @error('value')
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('value') }}
                                                </div>
                                            @enderror
                                        </div>
                                        @endforeach
                                    @elseif( sizeof($features) === 2 )
                                        @foreach ($features as $feature)

                                            <div class="form-group col-lg-6">
                                                <label for="">{{ $feature->field->name }}</label>
                                                <input type="{{ $feature->field->type }}"
                                                    name="value[{{ $feature->id }}]"
                                                    class="form-control @error('value') is-invalid @enderror"
                                                    value="{{ $feature->value }}">
                                                @error('value')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('value') }}
                                                    </div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach ($features as $feature)
                                            <div class="form-group col-lg-3">
                                                <label for="">{{ $feature->field->name }}</label>
                                                <input type="{{ $feature->field->type }}"
                                                    name="value[{{ $feature->id }}]"
                                                    class="form-control @error('value') is-invalid @enderror"
                                                    value="{{ $feature->value }}">
                                                @error('value')
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('value') }}
                                                    </div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                {{-- ........................repeater bloc.......................... --}}
                                {{-- <div id="kt_repeater_3">
                                    <div class="form-group row">
                                        <div data-repeater-list="features" class="col-lg-12">
                                            @if (sizeof($features) === 3)
                                                <div data-repeater-item class="form-group row">
                                                    @foreach ($features as $feature)
                                                        <div class="form-group col-lg-3">
                                                            <label for="">{{ $feature->field->name }}</label>
                                                            <input type="{{ $feature->field->type }}"
                                                                name="value[{{ $feature->id }}]"
                                                                class="form-control @error('value') is-invalid @enderror"
                                                                value="{{ $feature->value }}">
                                                            @error('value')
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('value') }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                    <div class="col-md-1 mt-5" style="position: relative;top: 11px;">
                                                        <a href="javascript:;" data-repeater-delete=""
                                                            class="btn btn-sm font-weight-bolder btn-light-danger">
                                                            <i class="flaticon2-trash text-danger"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            @elseif( sizeof($features) === 2 )
                                                <div data-repeater-item class="form-group row">
                                                    @foreach ($features as $feature)
                                                        <div class="form-group col-lg-6">
                                                            <label for="">{{ $feature->field->name }}</label>
                                                            <input type="{{ $feature->field->type }}"
                                                                name="value[{{ $feature->id }}]"
                                                                class="form-control @error('value') is-invalid @enderror"
                                                                value="{{ $feature->value }}">
                                                            @error('value')
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('value') }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-1 mt-5" style="position: relative;top: 11px;">
                                                            <a href="javascript:;" data-repeater-delete=""
                                                                class="btn btn-sm font-weight-bolder btn-light-danger">
                                                                <i class="flaticon2-trash text-danger"></i>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div data-repeater-item class="form-group row">
                                                    @foreach ($features as $feature)
                                                        <div class="form-group col-lg-3">
                                                            <label for="">{{ $feature->field->name }}</label>
                                                            <input type="{{ $feature->field->type }}"
                                                                name="value[{{ $feature->id }}]"
                                                                class="form-control @error('value') is-invalid @enderror"
                                                                value="{{ $feature->value }}">
                                                            @error('value')
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('value') }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                    <div class="col-md-1 mt-5" style="position: relative;top: 11px;">
                                                        <a href="javascript:;" data-repeater-delete=""
                                                            class="btn btn-sm font-weight-bolder btn-light-danger">
                                                            <i class="flaticon2-trash text-danger"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right"></label>
                                        <div class="col-lg-12">
                                            <a href="javascript:;" data-repeater-create=""
                                                class="btn btn-sm font-weight-bolder btn-info"
                                                style="float: right;margin-right:4rem;">
                                                <i class="la la-plus"></i>Add features
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- .................................................................... --}}
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('dashboard.ads') }}"
                                    class="btn btn-light-dark font-weight-bold mr-2">Back</a>
                                <button type="submit" class="btn btn-light-primary font-weight-bold mr-2">Edit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            // height: 350, // set editor height
            // width: 350, // set editor width
            minHeight: 100, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            dialogsFade: true, // set fade on dialog
            prettifyHtml: false,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']],
                // ['fontname', ['fontname']],
                // ['color', ['color']],
                ['para', ['ul', 'ol']],
                // ['height', ['height']],
                // ['table', ['table']],
                // ['insert', ['hr']],
                // ['view', ['fullscreen', 'codeview']],
                // ['help', ['help']]
            ]
        });
    </script> --}}
    <script src="{{ asset('js/input_repeat.js') }}" rel="preload" as="script" defer></script>
    <script type="text/javascript" rel="preload" as="script">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#" + input.nextElementSibling.getAttribute("id")).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        let img = document.querySelectorAll(".file")
        img.forEach((item) => {
            item.addEventListener("change", (e) => {
                readURL(e.target);
            })

        })  
        // ..............................KTFormRepeater...........................................
        var KTFormRepeater = function() {
            var demo3 = function() {
                $('#kt_repeater_3').repeater({
                    initEmpty: false,
                    defaultValues: {
                        'text-input': 'foo'
                    },
                    show: function() {
                        $(this).slideDown();
                    },
                    hide: function(deleteElement) {
                        if (confirm('Are you sure you want to delete this element?')) {
                            $(this).slideUp(deleteElement);
                        }
                    }
                });
            }
            return {
                init: function() {
                    demo3();
                }
            };
        }();
        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });
        //Textarea
    </script>
@endsection
