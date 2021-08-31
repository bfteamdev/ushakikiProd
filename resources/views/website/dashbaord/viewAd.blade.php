@extends('layout.app')
@section('adsActive') active @endsection
@section('edit') active @endsection

@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
    <style>
        .borderImgUnique {
            padding: 5px;
            width: 178px;
            border: 2px solid #dbac14;
            border-radius: 8px;
        }

        .borderImg {
            width: 165px;
            height: 100px;
            object-fit: contain;
        }

    </style>
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
                        <form action="{{ route('dashboard.ads.update', ['id' => $add->id]) }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-12 " style="overflow: auto;height: 235px;padding:0 !important;">
                                        @foreach ($photo as $item)
                                            <label for="file{{ $item->id }}" class="borderImgUnique">
                                                <div class="d-flex align-items-center justify-content-center mb-1 w-100">
                                                    <input type="radio" name="default">
                                                    <span class="font-weight-boldest">&nbsp;set default</span>
                                                </div>
                                                <input type="file" accept="image/*" name="image" class="file"
                                                    id="file{{ $item->id }}" onchange="readURL(this, 'blah');"
                                                    style="display: none;">
                                                <img id="image{{ $item->id }}"
                                                    src="{{ asset('storage/' . $item->name) }}"
                                                    alt="image-xxxx-xxxx{{ $item->id }}" class="borderImg" />
                                            </label>
                                        @endforeach
                                        @error('images')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('images') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control @error('title')
                                                                                                                                                                               is-invalid
                                                                                                       @enderror"
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
                                            <select name="category_id" id="" class="form-control @error('category_id')
                                                                                                                                                                        is-invalid
                                                                                                         @enderror">
                                                <option value="">selection la categorie</option>
                                                @foreach ($group as $item)
                                                    <optgroup label="{{ $item->name }}">
                                                        @foreach ($item->categories as $category)
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
                                            <select name="category_id" id="" class="form-control @error('category_id')
                                                                                                                                                                     is-invalid
                                                                                                     @enderror">
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script type="text/javascript">
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
                // debugger;
                readURL(e.target);
            })
        })
        // $("#file").change(function() {
        //     readURL(this);
        // });
    </script>
@endsection
