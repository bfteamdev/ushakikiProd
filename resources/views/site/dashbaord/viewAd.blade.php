@extends('layout.app')
@section('adsActive') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
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
                @include('site.dashbaord.sidebar')
                <div class="flex-row-fluid col-lg-12">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            <h2 class=" text-center">Edit Ad</h2>
                        </div>
                        <form action="{{ route('dashboard.ads.update',['id'=>$add->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-12 ">
                                        @foreach ($photo as $item)
                                            <input type="file" accept="image/*" name="image" class="file"
                                                onchange="readURL(this, 'blah');" style="display: none;">
                                            <img class="blah" src="{{ asset('storage/' . $item->name) }}" alt="your image"
                                                alt="No image" width="160" />
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
                                                                   @enderror" value="{{ $add->title }}">
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
                                        <textarea name="description" id="" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-light-dark font-weight-bold mr-2">Back</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            debugger
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.blah').each(function() {
                        $(this).attr('src', e.target.result);
                    });
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        // debugger
        let imgs = document.querySelectorAll(".file");
        // $(".image").change(function() {
        //     debugger
        //     readURL(this);
        // });
        imgs.forEach((item) => {
            item.addEventListener("change", function(e) {
                debugger
                readURL(this);
            })
        })

    </script>
@endsection
