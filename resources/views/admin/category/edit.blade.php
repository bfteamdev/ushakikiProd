@extends('layout.default')
@section('content')
    <div class="card card-custom col-lg-7 mx-auto">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title">
                    Modifier la categorie : <b>{{ $category->name }}</b>
                </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('category.update',['category'=> $category->id]) }}">
            @csrf
            @method("patch")
            <div class="card-body">
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="mb">
                    {{-- <h3 class="font-size-lg text-dark-75 font-weight-bold mb-10"></h3> --}}
                    <div class="mb-4 row">
                        <div class="form-group col-lg-6">
                            <label for="exampleSelect1">Groupe <span class="text-danger">*</span></label>
                            <select class="form-control @error('groupe_id') is-invalid @enderror" name="groupe_id">
                                <option></option>
                                @foreach ($groupe as $item)
                                    <option value="{{ $item->id }}" {{ $item->id === $category->groupe_id ? "selected":'' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('groupe_id')
                                <div class="invalid-feedback">{{ $errors->first('groupe_id') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Nom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nom du groupe " name="name" value="{{ old('name') ??  $category->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 ">
                            <label>Icon <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-success w-100" data-toggle="modal"
                                        data-target="#exampleModalCustomScrollable">
                                        Icons
                                    </button>
                                    <div class="modal fade" id="exampleModalCustomScrollable" tabindex="-1" role="dialog"
                                        aria-labelledby="staticBackdrop" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 1324px"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div data-scroll="true" data-height="738">
                                                        @include('admin.icons.svg')
                                                        <div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-lg-10 @error('icon') is-invalid @enderror"
                                    placeholder="Nom du groupe " name="icon" value="{{ old('icon') ??  $category->icon }}">
                                @error('icon')
                                    <div class="invalid-feedback">{{ $errors->first('icon') }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-12 ">
                        <label>Prix <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                            placeholder="Prix du categorie " name="price" value="{{ old('price') ??  $category->price }}" min="1">
                        @error('price')
                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                        @enderror
                    </div>
                </div>
                <div class="separator separator-dashed my-8"></div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route("category.index") }}" class="btn btn-light-dark"><i class="flaticon2-left-arrow-1"></i>Back</a>
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2 col-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
